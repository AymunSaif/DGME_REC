<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantCertification extends Model
{
    public function Applicant()
    {   
        return $this->belongsTo('App\Applicant');
    }
    public function Certification()
    {   
        return $this->belongsTo('App\Certification');
    }
}
