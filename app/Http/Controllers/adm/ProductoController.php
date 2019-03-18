<?php

namespace App\Http\Controllers\Adm;

use App\Familia;
use App\Producto;
use App\Extensions\Helpers;
use App\Tabla;
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

    public function tabla($id)
    {
        $producto = Producto::find($id);
        $tabla = Tabla::where('producto_id',$id)->orderBy('id','DESC')->get();
        //$t = Tabla::find($tabla->id);
        return view('adm.productos.tabla.index',compact('tabla','id','producto'));
    }

    public function tablastore(Request $request)
    {
        $tabla = new Tabla();
        $tabla->a = $request->a;
        $tabla->b = $request->b;
        $tabla->c = $request->c;
        $tabla->d = $request->d;
        $tabla->e = $request->e;
        $tabla->f = $request->f;
        $tabla->g = $request->g;
        $tabla->h = $request->h;
        $tabla->i = $request->i;
        $tabla->j = $request->j;
        $tabla->k = $request->k;
        $tabla->l = $request->l;
        $tabla->m = $request->m;
        $tabla->producto_id = $request->id;
        $tabla->save();
        return back()->with('success','Se creo correctamente');
    }

    public function tablaupdate(Request $request,$id)
    {
        $tabla = Tabla::find($id);
        $tabla->a = $request->a;
        $tabla->b = $request->b;
        $tabla->c = $request->c;
        $tabla->d = $request->d;
        $tabla->e = $request->e;
        $tabla->f = $request->f;
        $tabla->g = $request->g;
        $tabla->h = $request->h;
        $tabla->i = $request->i;
        $tabla->j = $request->j;
        $tabla->k = $request->k;
        $tabla->l = $request->l;
        $tabla->m = $request->m;
        $tabla->update();
        return back()->with('success','Se actualizo correctamente');
    }

    public function tabladestroy($id)
    {
        $tabla = Tabla::find($id);
        $tabla->delete();
        return back()->with('success','Se elimino correctamente');
    }
}
