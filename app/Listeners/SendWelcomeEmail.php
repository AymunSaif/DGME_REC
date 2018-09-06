<?php

namespace App\Listeners;

use App\Events\NewApplicant;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\NewApplicantWelcome;
class SendWelcomeEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewApplicant  $event
     * @return void
     */
    public function handle(NewApplicant $event)
    {
      Mail::to($event->applicant->email)->send(new NewApplicantWelcome($event->applicant));
    }
}
