<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Appointment extends Model
{
    //
    protected $fillable = [
        'description',
        'specialty_id',
        'doctor_id',
        'patient_id',
        'scheduled_date',
        'scheduled_time',
        'type'
    ];

   // N Appointment -> specialty -
    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    // Appointment -> doctor
    public function doctor()
    {
        return $this->belongsTo(User::class);
    }

    // Appointment -> patient
    public function patient()
    {
        return $this->belongsTo(User::class);
    }

    //accessor

    public function getScheduledTime12Attribute()
    {
        return (new Carbon($this->scheduled_time))
        ->format('g:i A');
    }

    public function cancellation()
    {
        return $this->hasOne(CancelledAppointment::class);
    }
}
