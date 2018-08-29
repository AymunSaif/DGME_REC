<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HigherSubject extends Model
{
    protected $table="highersubjects";
    
    public function ApplicantHigherEducation()
    {   
        return $this->hasMany('App\ApplicantHigherEducation');
    }
}
