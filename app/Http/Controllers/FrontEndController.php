<?php

namespace App\Http\Controllers;

use App\Calidad;
use App\Slider;
use App\Novedad;
use App\Producto;
use App\Contenido;

class FrontEndController extends Controller
{
    public function index() {
        $sliders = Slider::where('section', 'home')->orderBy('order')->get();
        $text = Contenido::seccionTipo('home', 'texto')->first();
        $productos = Producto::where('destacado', true)->limit(4)->get();
        $novedades = Novedad::where('destacado', true)->orderBy('order')->limit(2)->get();
        $calidad = Calidad::orderBy('orden')->limit(3)->get();
        return view('page.index', compact('sliders', 'text', 'novedades', 'productos','calidad'));
    }

    public function empresa() {
        $sliders = Slider::where('section', 'empresa')->orderBy('order')->get();
        $empresa = Contenido::seccionTipo('empresa', 'texto') ->orderBy('order')->get();
        $mercados = Contenido::seccionTipo('empresa_mercados', 'imagen')->orderBy('order')->get();
        $clientes = Contenido::seccionTipo('empresa_clientes', 'imagen')->orderBy('order')->get();
        return view('page.empresa', compact('sliders', 'empresa', 'mercados', 'clientes'));
    }
    public function descargas() {
        $headerLogos = Contenido::seccionTipo('descargas', 'imagen')->orderBy('order')->get();
        $catalogos = Contenido::seccionTipo('descargas_catalogos', 'descargable')->orderBy('order')->get();
        $mm = Contenido::seccionTipo('descargas_mm', 'descargable')->orderBy('order')->get();
        return view('page.descargas', compact('headerLogos', 'catalogos', 'mm'));
    }
    public function calidad() {
        $imagenes = Contenido::seccionTipo('calidad', 'imagen')->orderBy('order')->get();
        $texto = Contenido::seccionTipo('calidad', 'texto')->orderBy('order')->first();
        $certificados = Contenido::seccionTipo('calidad', 'descargable')->orderBy('order')->get();
        return view('page.calidad', compact('imagenes', 'texto', 'certificados'));
    }
    public function videos() {
        $videos = Contenido::seccionTipo('videos', 'video')->orderBy('order')->get();
        return view('page.videos', compact('videos'));
    }
    public function distribuidores() {
        $imagen = Contenido::seccionTipo('distribuidores', 'imagen')->first();
        $distribuidores = Contenido::seccionTipo('distribuidores', 'texto')->orderBy('order')->get();
        $provincia = Contenido::where('provincia','!=',null)->orderBy('order')->get();
        $mundo = Contenido::where('provincia',null)->where('section','distribuidores')->orderBy('order')->get();
        return view('page.distribuidores', compact('imagen','distribuidores','provincia','mundo'));
    }
    public function herramientas() {
        $herramientas = Contenido::seccionTipo('herramientas', 'texto')->orderBy('order')->get();
        return view('page.herramientas.index', compact('herramientas'));
    }
}
