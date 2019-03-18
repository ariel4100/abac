<?php

namespace App\Http\Controllers\adm;

use App\Descarga;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DescargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descargas = Descarga::all();
        return view('adm.privada.descarga.index', compact('descargas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //distribuidores
        $distribuidor = array('No Exclusivo', 'Exclusivo','Exterior');
        return view('adm.privada.descarga.create',compact('distribuidor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $file_save = Helpers::saveImage($request->file('file_image'), 'descarga');
        $file_save ? $data['file_image'] = $file_save : false;


        $file_save = Helpers::saveFile($request->file('file'), 'descarga');
        $file_save ? $data['file'] = $file_save : false;

        Descarga::create($data);
        $success = 'Familia creado con éxito';

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
        //distribuidores
        $distribuidor = array('No Exclusivo', 'Exclusivo','Exterior');
        $descarga = Descarga::find($id);
        return view('adm.privada.descarga.edit',compact('descarga','distribuidor'));
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
        $descarga = Descarga::find($id);
        $descarga->nombre_es = $request->nombre_es;
        $descarga->nombre_en = $request->nombre_en;
        $descarga->distribuidor = $request->distribuidor;
        $descarga->orden = $request->orden;

        if ($request->file)
        {
            $file_save = Helpers::saveFile($request->file('file'), 'descarga');
            $file_save ? $data['file'] = $file_save : false;
        }else{
            $descarga->file = $descarga->file;
        }

        if ($request->file_image)
        {
            $file_save = Helpers::saveImage($request->file('file_image'), 'descarga');
            $file_save ? $data['file_image'] = $file_save : false;
        }else{
            $descarga->file_image = $descarga->file_image;
        }
        $descarga->update();

        return back();

    }
    public function eliminar($id) {
        $descarga = Descarga::find($id);
        $descarga->delete();
        return redirect()->back()->with('alert','se elimino correctamente');
    }
}
