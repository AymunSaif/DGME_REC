<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    public function ApplicantHigherEducation()
    {   
        return $this->hasMany('App\ApplicantHigherEducation');
    }
}
