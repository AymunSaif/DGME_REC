<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function ApplicantDetail()
    {   
        return $this->hasMany('App\ApplicantDetail');
    }
    public function Cities(){
        return $this->hasMany('App\City');
    }
    public function Province()
    {   
        return $this->belongsTo('App\Province');
    }
}
