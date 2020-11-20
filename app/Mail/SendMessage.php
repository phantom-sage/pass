<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;
class SendMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $subject;

     public function __construct($message){

         $this->subject = $message;
     }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

      return $this->subject("pass-sudan")
                 ->view('emails.send')->with([
                        'msg' => $this->subject->message,
                    ]); ;
                 ->view('emails.send'); 
    }
}
