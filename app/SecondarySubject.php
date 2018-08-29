<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecondarySubject extends Model
{
    protected $table="secondarysubjects";

    public function ApplicantSecondaryEducation()
    {   
        return $this->hasMany('App\ApplicantSecondaryEducation');
    }
    //
}
