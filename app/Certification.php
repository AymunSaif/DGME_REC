<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    public function ApplicantCertification(){
        return $this->hasMany('App\ApplicantCertification');
    }
}
