<?php

namespace App\Http\Controllers\adm;

use App\Calidad;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calidad = Calidad::orderBy('orden')->limit(3)->get();
        return view('adm.contenido.calidad.index',compact('calidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm.contenido.calidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_save = Helpers::saveImage($request->file('file_image'), 'calidad');
        $file_save_pdf = Helpers::saveFile($request->file('pdf'), 'calidad');
        $calidad = new Calidad();
        $calidad->nombre_es = $request->nombre_es;
        $calidad->nombre_en = $request->nombre_en;
        $calidad->orden = $request->orden;
        $calidad->pdf = $file_save_pdf;
        $calidad->file_image = $file_save;
        $calidad->save();

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calidad = Calidad::find($id);
        return view('adm.contenido.calidad.edit',compact('calidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $calidad = Calidad::find($id);
        $calidad->nombre_es = $request->nombre_es;
        $calidad->nombre_en = $request->nombre_en;
        $calidad->orden = $request->orden;
        if ($request->pdf)
        {
            $calidad->pdf = Helpers::saveFile($request->file('pdf'), 'calidad');
        }
        if ($request->file_image)
        {
            $calidad->file_image = Helpers::saveImage($request->file('file_image'), 'calidad');
        }
        $calidad->update();

        return redirect()->route('contenido.calidad.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        $calidad = Calidad::find($id);
        $calidad->delete();
        return back();
    }
}
