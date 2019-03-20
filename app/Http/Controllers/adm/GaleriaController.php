<?php

namespace App\Http\Controllers\adm;

use App\Extensions\Helpers;
use App\Galeria;
use App\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adm.productos.galeria.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $producto = Producto::find($id);
        return view('adm.productos.galeria.create',compact('producto'));
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

        $file_save = Helpers::saveImage($request->file('file_image'), 'galeria');
        $file_save ? $data['file_image'] = $file_save : false;

        Galeria::create($data);
        $success = 'Producto creado con éxito';
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
        $producto = Producto::find($id);
        $galeria = Galeria::where('producto_id',$producto->id)->get();
        return view('adm.productos.galeria.show',compact('producto','galeria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galeria = Galeria::find($id);
        return view('adm.productos.galeria.edit',compact('galeria'));
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
        $galeria = Galeria::find($id);
        $data = $request->all();
        if($request->file_image)
        {
            $file_save = Helpers::saveImage($request->file('file_image'), 'galeria');
            $file_save ? $data['file_image'] = $file_save : false;
        }

        $galeria->update($data);

        return redirect()->route('producto.galeria',$galeria->producto_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        $galeria = Galeria::find($id);
        $galeria->delete();
        return back();
    }
}
