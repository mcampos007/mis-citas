<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialty;
use App\Appointment;
use Carbon\Carbon;
use App\Interfaces\ScheduleServiceInterface;
use Validator;

class AppointmentController extends Controller
{
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
}
