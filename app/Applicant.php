<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Applicant extends Model

{
    public function ApplicantDetail()
    {
        return $this->hasOne('App\ApplicantDetail');
    }
    public function Applicant()
    {
        return $this->hasOne('App\Applicant');
    }
    public function ApplicantCertification(){
        return $this->hasMany('App\ApplicantCertification');
    }
    public function CnicLogs(){
        return $this->hasMany('App\CnicLog');
    }
    public function ApplicantExperience(){
        return $this->hasMany('App\ApplicantExperience');
    }
    public function ApplicantHigherEducation()
    {
        return $this->hasMany('App\ApplicantHigherEducation');
    }
    public function ApplicantSecondaryEducation()
    {
        return $this->hasMany('App\ApplicantSecondaryEducation');
    }
    public function ApplicantAppliedFor()
    {
        return $this->hasMany('App\ApplicantAppliedFor');
    }
    

}
