<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactoMail extends Mailable
{
    use Queueable, SerializesModels;

    private $nombre, $telefono, $empresa, $email, $mensaje;
    
    public function __construct($nombre, $telefono, $empresa, $email, $mensaje)
    {
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->empresa = $empresa;
        $this->email = $email;
        $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('templates.mail')->with([
                'nombre' => $this->nombre,
                'telefono' => $this->telefono,
                'empresa' => $this->empresa,
                'email' => $this->email,
                'mensaje' => $this->mensaje
            ]);
    }
}
