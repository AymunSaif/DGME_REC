<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantAppliedFor extends Model
{
    protected $table= 'applicant_appliedfor';

    public function Applicant()
    {   
        return $this->belongsTo('App\Applicant');
    }
}
