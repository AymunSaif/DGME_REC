<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantDetail extends Model
{
    public function Applicant()
    {   
        return $this->belongsTo('App\Applicant');
    }
    public function ApplicantAppliedfor()
    {   
        return $this->belongsTo('App\ApplicantAppliedFor');
    }
    public function District()
    {   
        return $this->belongsTo('App\District');
    }
    public function City()
    {   
        return $this->belongsTo('App\City');
    }
    public function Province()
    {   
        return $this->belongsTo('App\Province');
    }
}
