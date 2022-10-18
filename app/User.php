<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'dni', 'address', 'phone', 'role','avatar', 'polipriv', 'last_name','confirmation_code','fecha_nac'
    ];


     public function specialties()
        {
            // code...
            return $this->belongsToMany(Specialty::class)->withTimestamps();
            //return $this->belongsToMany(Speciality::class)->withTimestamps();
        }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'pivot',
    ];

   
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopePatients($query)
    {
        return $query->where('role','patient');
    }

    public function scopeDoctors($query)
    {
        return $query->where('role','doctor');
    }

    // N Usuario -> tipodoc -
    public function tipodoc()
    {
        return $this->belongsTo(Tipodoc::class);
    }
}
