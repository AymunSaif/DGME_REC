<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{  
    public function ApplicantDetail()
    {   
        return $this->hasMany('App\ApplicantDetail');
    }
    public function District()
    {   
        return $this->belongsTo('App\District');
    }
   
}
