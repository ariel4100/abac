<?php

namespace App\Http\Controllers;

use App\Contenido;
use App\Mail\ContactoMail;
use App\Mail\TrabajaConNosotrosMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index() {
        $maps = Contenido::seccionTipo('contacto', 'texto')->orderBy('order')->first();
        return view('page.contacto.index', compact('maps'));
    }
    public function store(Request $request) {
        ini_set('max_execution_time', 180); //3 minutes
        $correo = Contenido::seccionTipo('datos', 'texto')->get();
        $correo = $correo[2];

        Mail::to($correo->title_es)->send(new ContactoMail(
                        $request->nombre,
                        $request->telefono,
                        $request->empresa,
                        $request->email,
                        $request->mensaje
                    )
        );
      	if (count(Mail::failures()) > 0) {
          $success = 'Ha ocurrido un error al enviar el correo';
          return back()->with('success', $success);
        }
          
        $success = 'Correo enviado correctamente';
        return back()->with('success', $success);
    }

    public function storeContactoWork(Request $request) {
        ini_set('max_execution_time', 180); //3 minutes
        $correo = Contenido::seccionTipo('datos', 'texto')->get();
        $correo = $correo[2];

        Mail::to($correo->title_es)->send(new TrabajaConNosotrosMail(
                $request->nombre,
                $request->apellido,
                $request->nacimiento,
                $request->sexo,
                $request->estado_civil,
                $request->nacionalidad,
                $request->direccion,
                $request->localidad,
                $request->provincia,
                $request->telefono,
                $request->dni,
                $request->email,
                $request->sector
            )
        );
        if (count(Mail::failures()) > 0) {
            $success = 'Ha ocurrido un error al enviar el correo';
            return back()->with('success', $success);
        }

        $success = 'Correo enviado correctamente';
        return back()->with('success', $success);
    }

    public function showPersonalizado() {
        $personalizado = Contenido::seccionTipo('contacto_personalizado', 'texto')->orderBy('order')->get();
        return view('page.contacto.personalizado', compact('personalizado'));
    }

    public function showContactoWork() {
        $sector = array('Administración','Ventas','Ingeniería','Depósito','Montaje','CNC','Compras','Sistemas','Calidad','Maestranza','Mantenimiento','Otros');
        return view('page.contacto.trabajo',compact('sector'));
    }
}
