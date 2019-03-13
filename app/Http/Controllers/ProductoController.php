<?php

namespace App\Http\Controllers;

use App\Familia;
use App\Producto;
use App\Contenido;
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
        $familias = Familia::all();
        $familia = $producto->familia;
        $productos = $familia->productos;
        $contenido = $this->contenido;
        $randomProducts = Producto::where('familia_id', $producto->familia_id)->limit(3)->get();
        return view('page.productos.producto.show', compact('familias', 'familia', 'contenido', 'producto', 'productos', 'randomProducts'));
    }
}
