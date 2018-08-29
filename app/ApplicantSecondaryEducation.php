<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantSecondaryEducation extends Model
{
    protected $table = "applicant_secondary_education";
    public function Applicant()
    {   
        return $this->belongsTo('App\Applicant');
    }
    public function SecondarySubject()
    {   
        return $this->belongsTo('App\SecondarySubject');
    }
}
