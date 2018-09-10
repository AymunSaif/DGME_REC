<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantResearchWork extends Model
{
    public function Applicant()
    {
        return $this->belongsTo('App\Applicant');
    }
}
