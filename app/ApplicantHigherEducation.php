<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantHigherEducation extends Model
{ 
    protected $table = "applicant_higher_education";
    public function applicant()
    {   
        return $this->belongsTo('App\Applicant');
    }
    public function higherSubject()
    {   
        return $this->belongsTo('App\HigherSubject');
    }
}
