<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $details5;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details5)
    {
        $this->details5=$details5;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reply Your Message')
        ->view('Guest.Message_Email');
    }
}
