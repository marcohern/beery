<?php

namespace App\Mail;

use App\Models\BuyRequest;
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
        $this->buyRequest = new BuyRequest();
        $this->buyRequest->flavor = $buyRequest['flavor'];
        $this->buyRequest->qty = $buyRequest['qty'];
        $this->buyRequest->name = $buyRequest['name'];
        $this->buyRequest->email = $buyRequest['email'];
        $this->buyRequest->comments = $buyRequest['comments'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to(config('beery.emails.sales'),config('beery.title'))
            ->from(config('beery.emails.relay'))
            ->replyTo($this->buyRequest->email)
            ->text('mail.buy');
    }
}
