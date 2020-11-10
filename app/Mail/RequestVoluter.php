<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestVoluter extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $subject;

     public function __construct($volunteer){

         $this->subject = $volunteer;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from('example@example.com')
                 ->view('emails.request-volunteer');
    }
}
