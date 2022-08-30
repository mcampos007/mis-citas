<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    //
    function users()
    {
        // code...
        return $this->belongsToMany(User::class)->withTimestamps();

    }

    /*function users()
    {
    return $this->belongsToMany(User::class)->withTimestamps();
    }*/
}
