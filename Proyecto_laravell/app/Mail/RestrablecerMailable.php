<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class RestrablecerMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($usuario, $token){
        $this->usuario = $usuario;
        $this->token = $token;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope{
        return new Envelope(
            from: new Address('sebastiantriana1911@gmail.com', 'Sebastian Triana'),
            subject: 'Reestablecimiento de contraseña',
        );
    }
    public function build(){
        return $this->view('emails.email',['usuario' => $this->usuario, 'password' => $this->token]);
    }

    // public function content(): Content{
    //     return new Content(
    //         view: ['emails.email',['usuario' => $usuario]],
    //     );
    // }

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
