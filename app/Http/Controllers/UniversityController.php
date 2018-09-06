<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\University;

class UniversityController extends Controller
{
     
    public function getuniv(){
        return University::all();
    }
    public function index()
    {
        University::where('status',1)->get();
    }
}
