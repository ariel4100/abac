<?php

namespace App\Http\Controllers\adm;

use App\Novedad;
use App\Categoria;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NovedadController extends Controller
{
    public function index() {
        $categorias = Categoria::all();
        return view('adm.novedades.index', compact('categorias'));
    }

    public function show(Categoria $categoria) {
        $novedades = $categoria->novedades()->orderBy('order')->paginate(8);
        return view('adm.novedades.show', compact('novedades', 'categoria'));
    }

    public function create() {
        $categorias = Categoria::all();
        return view('adm.novedades.create', compact('categorias'));
    }

    public function store(Request $request) {
        $data = $request->all();

        isset($data['destacado']) ? $data['destacado'] = true : $data['destacado'] = false;

        $file_save = Helpers::saveImage($request->file('image'), 'novedades');
        $file_save ? $data['image'] = $file_save : false;

        Novedad::create($data);
        $success = 'Novedad creada con éxito';

        return back()->with('success', $success);
    }

    public function edit(Novedad $novedad) {
        $categorias = Categoria::all();
        return view('adm.novedades.edit', compact('categorias', 'novedad'));
    }

    public function update(Novedad $novedad, Request $request) {
        $data = $request->all();

        isset($data['destacado']) ? $data['destacado'] = true : $data['destacado'] = false;

        $file_save = Helpers::saveImage($request->file('image'), 'novedades');
        $file_save ? $data['image'] = $file_save : false;

        $novedad->update($data);
        $success = 'Novedad actualizada con éxito';

        return back()->with('success', $success);
    }

    public function destroy(Novedad $novedad) {
        if ($novedad->delete()) {
            $success = 'Novedad eliminada con éxito';
            return back()->with('success', $success);
        }
        $err = 'No se pudo eliminar el contenido con éxito.';
        return back()->with('err', $err);
    }
}
