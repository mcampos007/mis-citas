<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipodoc extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    function users()
    {
        // code...
        return $this->belongsToMany(User::class)->withTimestamps();

    }
}
