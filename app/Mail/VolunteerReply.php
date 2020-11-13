<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VolunteerReply extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $PartnerRequest;

     public function __construct($PartnerRequest){

         $this->PartnerRequest = $PartnerRequest;

     }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
     {
       return $this->from('example@example.com')
       				->subject("volunteer request")
                    ->view('emails.volunteers');
     }
}
