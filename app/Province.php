<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function ApplicantDetail()
    {   
        return $this->hasMany('App\ApplicantDetail');
    }
   }
