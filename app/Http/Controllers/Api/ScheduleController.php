<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\ScheduleServiceInterface;

use App\Work_day;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    //
    public function hours(Request $request, ScheduleServiceInterface $scheduleService)
    {
        //dd($request->toArray());

        $rules = [
            'date' => 'required|date_format:"Y-m-d"',
            'doctor_id' => 'required|exists:users,id'
        ];

        $this->validate($request, $rules);
        //dd($request)->toArray(); 
      //  dd($day);
        $date = $request->input('date');
        
        $doctorId = $request->input('doctor_id');

        return $scheduleService->getAvailableIntervals($date, $doctorId);
        

    }
    
}
