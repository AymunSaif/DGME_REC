<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CnicLog extends Model
{
    public function User(){
      return $this->belongsTo('App\User');
    }
    public function Applicant(){
      return $this->belongsTo('App\Applicant');
    }
}
