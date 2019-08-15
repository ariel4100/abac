<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TrabajaConNosotrosMail extends Mailable
{
    use Queueable, SerializesModels;

    private $nombre,$apellido,$nacimiento,$sexo,$estado,$nacionalidad, $telefono,$provincia,$localidad, $direccion, $email, $dni;
    private $sector = [];

    /**
     * TrabajaConNosotrosMail constructor.
     * @param $nombre
     * @param $apellido
     * @param $nacimiento
     * @param $sexo
     * @param $estado
     * @param $nacionalidad
     * @param $telefono
     * @param $provincia
     * @param $localidad
     * @param $direccion
     * @param $email
     * @param $dni
     * @param array $sector
     */
    public function __construct($nombre, $apellido, $nacimiento, $sexo, $estado, $nacionalidad,$direccion,$localidad, $provincia, $telefono, $dni,  $email,  array $sector)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->nacimiento = $nacimiento;
        $this->sexo = $sexo;
        $this->estado = $estado;
        $this->nacionalidad = $nacionalidad;
        $this->telefono = $telefono;
        $this->provincia = $provincia;
        $this->localidad = $localidad;
        $this->direccion = $direccion;
        $this->email = $email;
        $this->dni = $dni;
        $this->sector = $sector;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('templates.mailwork')->with([
            'nombre' => $this->nombre ,
            'apellido' => $this->apellido,
            'nacimiento' => $this->nacimiento,
            'sexo' => $this->sexo,
            'estado' => $this->estado,
            'nacionalidad' => $this->nacionalidad,
            'telefono' => $this->telefono ,
            'provincia' => $this->provincia,
            'localidad' => $this->localidad,
            'direccion' => $this->direccion,
            'email' => $this->email,
            'dni' => $this->dni,
            'sector' => $this->sector,

        ])
            ->replyto($this->email)
            ->subject('Mensaje de Trabaje con Nosotros de la Pagina Web');;
    }
}
