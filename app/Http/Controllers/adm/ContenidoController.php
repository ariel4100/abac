<?php

namespace App\Http\Controllers\adm;

use App\Contenido;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContenidoController extends Controller
{
    public function index($section, $tipo) {
        
        // Dado el tipo de contenido (imagen, texto, descargable, etc), arrojara una vista pertinente al parametro proporcionado
        if ($tipo == 'texto') {
            $contenido = Contenido::seccionTipo($section, $tipo)->orderBy('order')->get();
            return view('adm.contenido.texto.index', compact('contenido', 'section'));
        }
        if ($tipo == 'imagen') {
            $contenido = Contenido::seccionTipo($section, $tipo)->orderBy('order')->get();
            return view('adm.contenido.imagen.index', compact('contenido', 'section'));
        }
        if ($tipo == 'descargable') {
            $contenido = Contenido::seccionTipo($section, $tipo)->orderBy('order')->get();
            return view('adm.contenido.descargable.index', compact('contenido', 'section'));
        }
        if ($tipo == 'video') {
            $contenido = Contenido::seccionTipo($section, $tipo)->orderBy('order')->get();
            return view('adm.contenido.videos.index', compact('contenido', 'section'));
        }
    }

    public function create(Contenido $contenido, $section, $tipo) {
        if ($tipo == 'texto'){
            return view('adm.contenido.texto.create', compact('contenido', 'section', 'tipo'));
        }
        if ($tipo == 'imagen'){
            return view('adm.contenido.imagen.create', compact('contenido', 'section', 'tipo'));
        }
        if ($tipo == 'descargable'){
            $descarga = Contenido::seccionTipo('descargas', 'imagen')->orderBy('order')->paginate(8);
            return view('adm.contenido.descargable.create', compact('contenido', 'section', 'tipo','descarga'));
        }
        if ($tipo == 'video') {
            return view('adm.contenido.videos.create', compact('contenido', 'section', 'tipo'));
        }
    }

    public function store(Request $request) {
        $data = $request->all();

        if ($request->section == 'descargas_catalogos')
        {
            $file_save = Helpers::saveFile($request->file('subtitle_en'), 'contenido');
            $file_save ? $data['subtitle_en'] = $file_save : false;
        }
        $file_save = Helpers::saveImage($request->file('image'), 'contenido');
        $file_save ? $data['image'] = $file_save : false;

        if ($request->type == 'descargable') {
            $file_save = Helpers::saveFile($request->file('ficha'), 'contenido');
            $file_save ? $data['ficha'] = $file_save : false;
        }

        Contenido::create($data);
        $success = ucfirst($request->type).' creado con éxito';

        return back()->with('success', $success);

    }

    public function edit($section, Contenido $contenido) {
        if ($contenido->type == 'texto') {
            return view('adm.contenido.texto.edit', compact('contenido'));
        }
        if ($contenido->type == 'imagen') {
            return view('adm.contenido.imagen.edit', compact('contenido'));
        }
        if ($contenido->type == 'descargable') {
            $descarga = Contenido::seccionTipo('descargas', 'imagen')->orderBy('order')->paginate(8);
            return view('adm.contenido.descargable.edit', compact('contenido','descarga'));
        }
        if ($contenido->type == 'video') {
            return view('adm.contenido.videos.edit', compact('contenido'));
        }
    }

    public function update(Request $request, Contenido $contenido) {
        $data = $request->all();

        $file_save = Helpers::saveImage($request->file('image'), 'contenido');
        $file_save ? $data['image'] = $file_save : false;

        if ($request->icon) {
            $file_save = Helpers::saveImage($request->file('icon'), 'contenido');
            $file_save ? $data['icon'] = $file_save : false;
        }
        if ($contenido->type == 'descargable') {
            $file_save = Helpers::saveFile($request->file('ficha'), 'contenido');
            $file_save ? $data['ficha'] = $file_save : false;
        }
        if ($contenido->section == 'descargas_catalogos')
        {
            $file_save = Helpers::saveFile($request->file('subtitle_en'), 'contenido');
            $file_save ? $data['subtitle_en'] = $file_save : false;
        }
        $contenido->update($data);
        
        $success = ucfirst($contenido->type).' actualizada con éxito';
        return back()->with('success', $success);
    }

    public function destroy(Contenido $contenido) {
        if ($contenido->delete()) {
            $success = ucfirst($contenido->type).' eliminado con éxito';
            return back()->with('success', $success);
        }
        $err = 'No se pudo eliminar el contenido con éxito.';
        return back()->with('err', $err);
    }
}
