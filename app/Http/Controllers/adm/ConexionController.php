<?php

namespace App\Http\Controllers\adm;

use App\Conexion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConexionController extends Controller
{
    public function apiconexion()
    {
        $conexion = Conexion::where('diametro',true)->get();
        $tipo = Conexion::where('diametro',null)->get();
        if ($conexion)
        {
            return  response()->json(['conexion' => $conexion,'tipo' => $tipo],200);
        }else{
            return response()->json(['alert' => 'mal']);
        }
    }
}
