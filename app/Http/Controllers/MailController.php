<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Mail\NewApplicantWelcome;
use Auth;
class MailController extends Controller
{
    public function email(){
      Mail::to('aihtshamdgme@gmail.com')->send(new NewApplicantWelcome());
    }
}
