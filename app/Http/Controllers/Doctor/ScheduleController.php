<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Work_day;

class ScheduleController extends Controller
{
    //
    private $days = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
        

    public function edit()
    {
        // code...

        $days = $this->days;
        return view('schedule', compact('days'));
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $active = $request->input('active') ?: [];
        $morning_start = $request->input('morning_start');
        $morning_end = $request->input('morning_end');
        $afternoon_start= $request->input('afternoon_start');
        $afternoon_end = $request->input('afternoon_end');

        $errors = [];

        for ($i=0; $i<7; ++$i)
        {
            if ($morning_start[$i] > $morning_end[$i]){

                $errors [] = 'Las Horas del turno mañana son inconsistentes para el dia '. $this->days[$i];
            }
            if ($afternoon_start[$i] > $afternoon_end[$i]){
                $errors [] = 'Las Horas del turno tarde son inconsistentes para el dia '. $this->days[$i];
            }

            Work_day::updateOrCreate(
                [
                    'day' => $i,
                    'user_id' => auth()->id() 
                ],
                [
                    'active' => in_array($i, $active),
                    
                    'morning_start' => $morning_start[$i],
                    'morning_end' => $morning_end[$i], 

                    'afternoon_start' => $afternoon_start[$i],
                    'afternoon_end' => $afternoon_end[$i]

                ]
            );
        }

        
        if ($errors)
            return  back()->with(compact('errors'));
        $notification = "Los datos de han registrado satisfactoriamente !!!.";
            return  back()->with(compact('notification'));
    }
}
