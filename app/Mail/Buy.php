<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Buy extends Mailable
{
    use Queueable, SerializesModels;

    public $buyRequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($buyRequest)
    {
        $this->buyRequest = $buyRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.buy');
    }
}
