<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialty;
use App\Appointment;
use App\CancelledAppointment;
use Carbon\Carbon;
use App\Interfaces\ScheduleServiceInterface;
use Validator;

class AppointmentController extends Controller
{
    //Lista de turnos
    public function index()
    {
        $role = auth()->user()->role;
        if ($role=='admin')
        {
            $pendingAppointments = Appointment::where('status','Reservada')
            ->paginate(10);
        $confirmedAppointments = Appointment::where('status','Confirmada')
            ->paginate(10);
        $oldAppointments = Appointment::whereIn('status',['Atendida','Cancelada'])
            ->paginate(10);    
        }
        // Patient
        elseif ($role == 'patient')
        {
            $pendingAppointments = Appointment::where('status','Reservada')
            ->where('patient_id',auth()->id())
            ->paginate(10);
        $confirmedAppointments = Appointment::where('status','Confirmada')
            ->where('patient_id',auth()->id())
            ->paginate(10);
        $oldAppointments = Appointment::where('patient_id',auth()->id())
            ->whereIn('status',['Atendida','Cancelada'])
            ->paginate(10);    
        }elseif ($role='doctor') {
            $pendingAppointments = Appointment::where('status','Reservada')
            ->where('doctor_id',auth()->id())
            ->paginate(10);
        $confirmedAppointments = Appointment::where('status','Confirmada')
            ->where('doctor_id',auth()->id())
            ->paginate(10);
        $oldAppointments = Appointment::where('doctor_id',auth()->id())
            ->whereIn('status',['Atendida','Cancelada'])
            ->paginate(10);
        }else

        {

        }
        // doctor
        // Administrador

      // dd($pendingAppointments);
        return view('appointments.index', compact('pendingAppointments','oldAppointments','confirmedAppointments','role'));
    }

    // Mostrar detalles de un turno
    public function show(Appointment $appointment)
    {
        $role = auth()->user()->role;
        return view('appointments.show', compact('appointment','role'));
    }
    //Creacion de un turno
    public function create(ScheduleServiceInterface $scheduleService){
        $specialties = Specialty::all(); 
        $specialtyId = old('specialty_id');

        if ($specialtyId){
            $specialty = Specialty::find($specialtyId);
            $doctors = $specialty->users;
        }else{
         $doctors = collect();
        }

        $date = old('scheduled_date');
        $doctorId = old('doctor_id');
        if ($date && $doctorId){
            $intervals = $scheduleService->getAvailableIntervals($date, $doctorId);
        } else {
            $intervals = null;
        }

        return view('appointments.create', compact('specialties','doctors', 'intervals'));
    }
    //REgistro de un turnos
    public function store(Request $request, ScheduleServiceInterface $scheduleService)
    {
     // dd($request->interval);
      $rules = [
         'description' => 'required',
         'specialty_id' => 'exists:specialties,id',
         'doctor_id' => 'exists:users,id',
         'scheduled_time' => 'required'
      ];

      $messages = [
         'scheduled_time.required' => 'Por favor ingrese una hora válida para su turno'
      ];

      $validator = Validator::make($request->all(), $rules, $messages);

      $validator->after(function ($validator) use ($request, $scheduleService) {
        $date = $request->input('scheduled_date');
        $doctorId = $request->input('doctor_id');
        $scheduled_time = $request->input('scheduled_time');

        if ($date && $doctorId && $scheduled_time){
            $start = new Carbon($scheduled_time);
        }else{
            return ;
        }
        if (!$scheduleService->isAvailableInterval($date, $doctorId, $start)){
            $validator->errors()
                ->add('available_time', 'La hora seleccionada ya se encuentra reervada por otro paciente');
        }
      });

      if($validator->fails()){
        return back()
                ->withErrors($validator)
                ->withInput();
      }

      $data = $request->only([
         'description',
        'specialty_id',
        'doctor_id',
        'scheduled_date',
        'scheduled_time',
        'type'
     ]);
      $data['patient_id'] = auth()->id();
      $carbonTime = Carbon::createFromFormat('g:i A', $data['scheduled_time']);
      $data['scheduled_time'] = $carbonTime->format('H:i:s');
      //dd($data);
      Appointment::create($data);

      $notification = "El turno se ha registrado correctamente.";
      return back()->with(compact('notification'));
    }

    //Mostrar formulario de cancelacion
    public function showCancelForm(Appointment $appointment)
    {
        if ($appointment->status == "Confirmada")
        {
            $role = auth()->user()->role;
            //dd($role);
            return view('appointments.cancel', compact('appointment', 'role'));
        }

        return redirect('/appointments');
    }

    //Cancelacion de un turno
    public function postCancel(Appointment $appointment, Request $request)
    {
       //dd($appointment);
        if($request->has('justification'))
        {
            $cancellation = new CancelledAppointment();
            $cancellation->justification = $request->input('justification');
            $cancellation->cancelled_by_id = auth()->id();
            $appointment->cancellation()->save($cancellation);   
        }
        
        $appointment->status = 'Cancelada';
        $appointment->save();

        $notification = 'El turno se ha cancelado correctamente.';
        return redirect('/appointments')->with(compact('notification'));
    }
    //Confirmación de un turno
    public function postConfirm(Appointment $appointment)
    {

        
        $appointment->status = 'Confirmada';
        $appointment->save();

        $notification = 'El turno se ha confirmado correctamente.';
        return redirect('/appointments')->with(compact('notification'));
    }

        
}
