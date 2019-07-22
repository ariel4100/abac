<?php

namespace App\Http\Controllers\adm;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    public function index() {
        $categorias = Categoria::orderBy('order')->paginate(8);
        return view('adm.categorias.index', compact('categorias'));
    }

    public function create() {
        return view('adm.categorias.create');
    }

    public function store(Request $request) {
        $data = $request->all();

        Categoria::create($data);
        $success = 'Categoria creado con éxito';

        return back()->with('success', $success);
    }

    public function edit(Categoria $categoria) {
        return view('adm.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria) {
        $data = $request->all();

        $categoria->update($data);

        $success = 'Registro editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy(Categoria $categoria) {
        $categoria->delete();

        $success = 'Registro eliminado correctamente';
        return back()->with('success', $success);
    }
}
