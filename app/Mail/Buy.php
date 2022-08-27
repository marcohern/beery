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

    public $order;
    public $details;
    public $flavors;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $details, $flavors)
    {
        $this->order   = $order;
        $this->details = $details;
        $this->flavors = $flavors;
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
            ->replyTo($this->order->email)
            ->subject("Buy Request")
            ->view('forty.mail.html.buy')
            ->text('forty.mail.text.buy');
    }
}
