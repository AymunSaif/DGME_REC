<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantHigherEducation extends Model
{ 
    protected $table = "applicant_higher_education";
    public function Applicant()
    {   
        return $this->belongsTo('App\Applicant');
    }
    public function HigherSubject()
    {   
        return $this->belongsTo('App\HigherSubject','highersubject_id');
    }
    public function University()
    {   
        return $this->belongsTo('App\University');
    }
}
