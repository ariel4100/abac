<?php

namespace App\Http\Controllers\Adm;

use App\Contenido;
use App\Familia;
use App\Producto;
use App\Extensions\Helpers;
use App\ProductoRelacionados;
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
        $productos = $familia->productos()->get();
        return view('adm.productos.show', compact('familia', 'productos'));
    }

    public function create() {
        $productos = Producto::all();
        $familias = Familia::all();
        $catalogo = Contenido::seccionTipo('descargas_catalogos', 'descargable')->where('grupo_es','CATÁLOGOS')->orderBy('order')->get();
        $montaje = Contenido::seccionTipo('descargas_mm', 'descargable')->orderBy('order')->get();
        return view('adm.productos.create', compact('familias','montaje','catalogo','productos'));
    }

    public function store(Request $request) {
        $data = $request->all();

        isset($data['destacado']) ? $data['destacado'] = true : $data['destacado'] = false;
        isset($data['buscado']) ? $data['buscado'] = true : $data['buscado'] = false;


        $file_save = Helpers::saveImage($request->file('image'), 'productos');
        $file_save ? $data['image'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('img'), 'productos');
        $file_save ? $data['img'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('img_en'), 'productos');
        $file_save ? $data['img_en'] = $file_save : false;

        $file_save = Helpers::saveFile($request->file('ficha'), 'productos');
        $file_save ? $data['ficha'] = $file_save : false;

        $file_save = Helpers::saveFile($request->file('ficha_variante'), 'productos');
        $file_save ? $data['ficha_variante'] = $file_save : false;

        /*$file_save = Helpers::saveFile($request->file('ficha_variante'), 'productos');
        $file_save ? $data['ficha_variante'] = $file_save : false;*/

        Producto::create($data);
        $p = Producto::all();
        $idUltimo = $p->last();
        if ($request->get('relacionados')) {
            foreach ($request->get('relacionados') as $item) {
                //var_dump($item);
                ProductoRelacionados::create([
                    'producto_id' => $item,
                    'producto' => $idUltimo->id,
                ]);
            }
        }
        $success = 'Producto creado con éxito';

        return back()->with('success', $success);
    }

    public function edit(Producto $producto) {
        $familias = Familia::all();
        //edit producto relacionados
        $productos = Producto::all();
        $productorelacionado = ProductoRelacionados::where('producto',$producto->id)->get();
        //$userSelected = $descarga->user()->get()->pluck('id')->toArray();
        $pr = $productorelacionado->pluck('producto_id');
        $catalogo = Contenido::seccionTipo('descargas_catalogos', 'descargable')->where('grupo_es','CATÁLOGOS')->orderBy('order')->get();
        $montaje = Contenido::seccionTipo('descargas_mm', 'descargable')->orderBy('order')->get();
        //dd($pr);
        return view('adm.productos.edit', compact('producto', 'familias','pr','catalogo','montaje','productorelacionado','productos'));
    }

    public function update(Producto $producto, Request $request) {
        $data = $request->all();
        $data = $request->except('relacionados');


        isset($data['destacado']) ? $data['destacado'] = true : $data['destacado'] = false;
        isset($data['buscado']) ? $data['buscado'] = true : $data['buscado'] = false;
        $file_save = Helpers::saveImage($request->file('image'), 'productos');
        $file_save ? $data['image'] = $file_save : false;

        $file_save = Helpers::saveFile($request->file('ficha'), 'productos');
        $file_save ? $data['ficha'] = $file_save : false;

        $file_save = Helpers::saveFile($request->file('ficha_variante'), 'productos');
        $file_save ? $data['ficha_variante'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('img'), 'productos');
        $file_save ? $data['img'] = $file_save : false;

        $file_save = Helpers::saveImage($request->file('img_en'), 'productos');
        $file_save ? $data['img_en'] = $file_save : false;

        /*$file_save = Helpers::saveFile($request->file('ficha_variante'), 'productos');
        $file_save ? $data['ficha_variante'] = $file_save : false;*/


        ProductoRelacionados::where('producto',$producto->id)->delete();
        if ($request->get('relacionados')) {
            foreach ($request->get('relacionados') as $item) {
                //var_dump($item);

                ProductoRelacionados::updateOrCreate([
                    'producto_id' => $item,
                    'producto' => $producto->id,
                ]);
            }
        }
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
        $tabla->diametro1 = $request->diametro1;
        $tabla->tipo = $request->tipo;
        $tabla->diametro2 = $request->diametro2;
        $tabla->tipo2 = $request->tipo2;
        //$tabla->b = $request->b;
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
        $tabla->diametro1 = $request->diametro1;
        $tabla->tipo = $request->tipo;
        $tabla->diametro2 = $request->diametro2;
        $tabla->tipo2 = $request->tipo2;
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



    //por categoria
    public function byCategory($id){
        $byCategory = Producto::where('familia_id',$id)->select('id','title_es')->get();
        return response()->json($byCategory);
    }
}
