<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantAppliedFor extends Model
{
    protected $table= 'applicant_appliedfor';

    public function ApplicantDetail()
    {   
        return $this->hasOne('App\ApplicantDetail');
    }
}
