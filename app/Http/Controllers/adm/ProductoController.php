<?php

namespace App\Http\Controllers\Adm;

use App\Familia;
use App\Producto;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductoController extends Controller
{
    public function index() {
        $familias = Familia::all();
        return view('adm.productos.index', compact('familias'));
    }

    public function show(Familia $familia) {
        $productos = $familia->productos()->paginate(8);
        return view('adm.productos.show', compact('familia', 'productos'));
    }

    public function create() {
        $familias = Familia::all();
        return view('adm.productos.create', compact('familias'));
    }

    public function store(Request $request) {
        $data = $request->all();

        isset($data['destacado']) ? $data['destacado'] = true : $data['destacado'] = false;

        $file_save = Helpers::saveImage($request->file('image'), 'productos');
        $file_save ? $data['image'] = $file_save : false;

        $file_save = Helpers::saveFile($request->file('ficha'), 'productos');
        $file_save ? $data['ficha'] = $file_save : false;

        Producto::create($data);
        $success = 'Producto creado con éxito';

        return back()->with('success', $success);
    }

    public function edit(Producto $producto) {
        $familias = Familia::all();
        return view('adm.productos.edit', compact('producto', 'familias'));
    }

    public function update(Producto $producto, Request $request) {
        $data = $request->all();

        isset($data['destacado']) ? $data['destacado'] = true : $data['destacado'] = false;

        $file_save = Helpers::saveImage($request->file('image'), 'productos');
        $file_save ? $data['image'] = $file_save : false;

        $file_save = Helpers::saveFile($request->file('ficha'), 'productos');
        $file_save ? $data['ficha'] = $file_save : false;

        $producto->update($data);
        $success = 'Producto actualizado con éxito';

        return back()->with('success', $success);
    }

    public function destroy(Producto $producto) {
        if ($producto->delete()) {
            $success = 'Producto eliminado con éxito';
            return back()->with('success', $success);
        }
        $err = 'No se pudo eliminar el contenido con éxito.';
        return back()->with('err', $err);
    }

}
