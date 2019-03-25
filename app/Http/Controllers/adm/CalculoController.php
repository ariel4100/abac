<?php

namespace App\Http\Controllers\adm;

use App\Calculo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalculoController extends Controller
{
    function index()
    {
        $calculo = Calculo::all();
        return view('adm.herramienta.calculo',  compact('calculo'));
    }

    function store(Request $request)
    {
        $calculo = new Calculo();
        $calculo->peso = $request->peso;
        $calculo->valor = $request->valor;
        $calculo->tipo = $request->tipo;
        $calculo->orden = $request->orden;
        $calculo->save();
        return back();
    }

    function edit($id)
    {
        $calculo = Calculo::find($id);
        return view('adm.herramienta.edit',  compact('calculo'));
    }

    function update(Request $request,$id)
    {
        $calculo = Calculo::find($id);
        $calculo->peso = $request->peso;
        $calculo->valor = $request->valor;
        $calculo->tipo = $request->tipo;
        $calculo->orden = $request->orden;
        $calculo->update();
        return redirect()->route('calculo.index');
    }

    //Api para obtener el tipo de gas o liquido
    function gas()
    {
        $gas = Calculo::where('tipo','gas')->get();
        return response()->json($gas);
    }
    function liquido()
    {
        $liquido = Calculo::where('tipo','liquido')->get();
        return response()->json($liquido);
    }
}
