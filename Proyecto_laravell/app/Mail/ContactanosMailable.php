<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactanosMailable extends Mailable{
    use Queueable, SerializesModels;

    public function __construct(){
        
    }

    public function envelope(): Envelope{
        return new Envelope(
            from: new Address('sebastiantriana1911@gmail.com', 'Sebastian Triana'),
            subject: 'Reestablecimiento de contraseña',
        );
    }

    public function content(): Content{
        return new Content(
            view: 'emails.email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
