<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class RestrablecerMailable extends Mailable{
    use Queueable, SerializesModels;

    // --------------------- CONTRUCTOR ---------------------
    // Al crear una nueva instancia del archivo mailable se 
    // pasa como parametro el usuario ya accedido y la nueva
    // contraseña que se le va a proporcionar, para poder
    // mostrar toda esa informacion en la vista que sera el 
    // correo
    public function __construct($usuario, $token){
        $this->usuario = $usuario;
        $this->token = $token;
    }
    // ------------------------------------------------------- 


    // ---------------------- ENVOLOPE -----------------------
    // El metodo envelope se ejecuta cada que se crea una nueva
    // instancia ya que esta es la que contiene el nombre de
    // la persona que recibira el correo y el asunto del correo
    // osea el por que se va a enviar
    public function envelope(): Envelope{
        return new Envelope(
            from: new Address($this->usuario->email,
            $this->usuario->nombre),
            subject: 'Reestablecimiento de contraseña',
        );
    }
    // ------------------------------------------------------- 


    // ------------------------ BUILD ------------------------
    // El metodo buid tambien se ejecuta cada que se instancia
    // un nuevo mailable y es la que retorna la vista que se va
    // a mostrar al enviar el correo, esta contendra la nueva
    // contraseña y la informacion de la persona a la que se le
    // enviara
    public function build(){
        return $this->view('emails.email',['usuario' => $this->usuario,
        'password' => $this->token]);
    }
    // ------------------------------------------------------- 

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
    public function attachments(): array{
        return [];
    }
}
