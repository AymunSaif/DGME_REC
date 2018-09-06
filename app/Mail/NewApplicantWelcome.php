<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Applicant;

class NewApplicantWelcome extends Mailable
{
    use Queueable, SerializesModels;
    public $applicant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct(Applicant $person)
     {
         $this->$applicant=$person;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.applicant.newapplicantwelcome');
    }
}
