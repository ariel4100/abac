<?php

namespace App\Http\Controllers;

use App\Familia;
use App\Galeria;
use App\Producto;
use App\Contenido;
use App\ProductoRelacionados;
use App\Tabla;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    private $contenido;

    public function __construct() {
        $this->contenido = Contenido::seccionTipo('productos', 'imagen')->first();
    }

    public function index() {
        $familias = Familia::all();
        $contenido = $this->contenido;
        return view('page.productos.familia.index', compact('familias', 'contenido'));
    }

    public function indexProducts(Familia $familia) {
        $familias = Familia::all();
        $productos = $familia->productos;
        $contenido = $this->contenido;
        return view('page.productos.producto.index', compact('productos', 'contenido', 'familia', 'familias'));
    }

    public function show(Producto $producto) {
        $galeria = Galeria::where('producto_id',$producto->id)->get();
        $tabla = Tabla::where('producto_id',$producto->id)->get();
        $familias = Familia::all();
        $familia = $producto->familia;
        $productos = $familia->productos;
        $contenido = $this->contenido;
        $randomProducts = ProductoRelacionados::leftJoin('productos','productos.id','producto_relacionados.producto_id')
            ->where('producto', $producto->id)->limit(3)->get();
        return view('page.productos.producto.show', compact('galeria','familias', 'familia', 'contenido', 'producto', 'productos', 'randomProducts','tabla'));
    }
}
