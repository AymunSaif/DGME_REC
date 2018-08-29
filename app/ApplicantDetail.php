<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantDetail extends Model
{
    public function applicant()
    {   
        return $this->belongsTo('App\Applicant');
    }
    public function applicantAppliedfor()
    {   
        return $this->belongsTo('App\ApplicantAppliedFor');
    }
    public function district()
    {   
        return $this->belongsTo('App\District');
    }
    public function city()
    {   
        return $this->belongsTo('App\City');
    }
    public function province()
    {   
        return $this->belongsTo('App\Province');
    }
}
