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
     public $message;

     public function __construct( Message $message){

         $this->message = $message;

     }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
  
      return $this->from('example@example.com')
             ->view('emails.send') ->with([
                        'email' => $this->message->email,
                        'message' => $this->message->message,
                    ]);
    }
}
