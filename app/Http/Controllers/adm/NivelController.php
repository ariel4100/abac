<?php

namespace App\Http\Controllers\adm;

use App\Nivel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NivelController extends Controller
{
    function index()
    {
        $nivel = Nivel::all();
        return view('adm.privada.nivel.index',  compact('nivel'));
    }

    function store(Request $request)
    {
        $nivel = new Nivel();
        $nivel->nombre = $request->nombre;
        $nivel->orden = $request->orden;
        $nivel->save();
        return back();
    }

    function edit($id)
    {
        $nivel = Nivel::find($id);
        return view('adm.privada.nivel.edit',  compact('nivel'));
    }

    function update(Request $request,$id)
    {
        $nivel = Nivel::find($id);
        $nivel->nombre = $request->nombre;
        $nivel->orden = $request->orden;
        $nivel->update();
        return redirect()->route('privadanivel.index');
    }

    public function eliminar($id){
        $nivel = Nivel::find($id);
        $nivel->delete();
        return back();
    }
}
