<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialty;
use App\Appointment;
use Carbon\Carbon;
class AppointmentController extends Controller
{
    //
     public function create(){
        $specialties = Specialty::all(); 
        $specialtyId = old('specialty_id');

        if ($specialtyId){
            $specialty = Specialty::find($specialtyId);
            $doctors = $specialty->users;
        }else{
         $doctors = collect();
        }


        return view('appointments.create', compact('specialties','doctors'));
    }

    public function store(Request $request)
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

      $this->validate($request, $rules, $messages);
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
      Appointment::create($data);

      $notification = "El turno se ha registrado correctamente.";
      return back()->with(compact('notification'));
    }
}
