<?php

namespace App\Http\Controllers;

use App\Novedad;
use App\Categoria;
use Illuminate\Http\Request;

class NovedadesController extends Controller
{
    public function index() {
        $novedades = Novedad::orderBy('order')->paginate(8);
        $categorias = Categoria::all();
        return view('page.novedades.index', compact('novedades', 'categorias'));
    }

    public function showCategory(Categoria $categoria) {
        $categorias = Categoria::all();
        $novedades = $categoria->novedades()->orderBy('order')->paginate(8);
        return view('page.novedades.showCategory', compact('novedades', 'categoria', 'categorias'));
    }

    public function showNovedad (Novedad $novedad) {
        $categorias = Categoria::all();
        return view('page.novedades.showNovedad', compact('novedad', 'categorias'));
    }
}
