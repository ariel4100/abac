<?php

namespace App\Http\Controllers;

use App\Csv;
use Illuminate\Http\Request;

class PrivadaController extends Controller
{
    public function index()
    {
        return view('privada.index');
    }

    public function materiaprima()
    {

        return view('privada.materiaprima');
    }


    public function distribuidor()
    {
        return view('privada.distribuidor');
    }

    // API REQUEST VUE
    public function buscar(Request $request)
    {
        $partidaComponente = Csv::where('partida','=',$request->body)->first();
        if ($partidaComponente)
        {
            return  response()->json($partidaComponente,200);
        }else{
            return response()->json(['alert' => 'Partida de componente incorrecta']);
        }
    }


    public function pdf()
    {
        return view('privada.distribuidor');
    }
}
