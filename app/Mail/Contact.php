<?php

namespace App\Mail;

use App\Models\ContactRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $contact)
    {
        $this->contact = new ContactRequest();
        $this->contact->name = $contact['name'];
        $this->contact->email = $contact['email'];
        $this->contact->message = $contact['message'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to("marcohern@gmail.com","Marco Hernandez")
            ->from($this->contact->email)
            ->text('mail.contact');
    }
}
