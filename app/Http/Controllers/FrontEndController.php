<?php

namespace App\Http\Controllers;

use App\Calidad;
use App\Familia;
use App\Slider;
use App\Novedad;
use App\Producto;
use App\Contenido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

//use http\Env\Request;

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
        //cambie order por grup_Es
        $headerLogos = Contenido::with('descargas')->seccionTipo('descargas', 'imagen')->get();
        //dd($headerLogos->first()->descargas);


        return view('page.descargas', compact('headerLogos'));
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
    public function distribuidores(Request $request) {
        $filtro = $request->get('provincia');
        //$pro = ['Ciudad Autónoma de Buenos Aires (CABA)','Buenos Aires','Catamarca','Córdoba','Corrientes','Entre Ríos','Jujuy','Mendoza','La Rioja','Salta','San Juan','San Luis','Santa Fe','Santiago del Estero','Tucumán','Chaco','Chubut','Formosa','Misiones','Neuquén','La Pampa','Río Negro','Santa Cruz','Tierra del Fuego'];
        $pro = Contenido::orderBy('order')->select('provincia')->get();
        $imagen = Contenido::seccionTipo('distribuidores', 'imagen')->first();
        $distribuidores = Contenido::seccionTipo('distribuidores', 'texto')->orderBy('order')->get();
        $provincia = Contenido::where('provincia','!=',null)->where('subtitle_es','=','arg')->where('provincia','LIKE',"%$filtro%")->orderBy('order')->get();
        $mundo = Contenido::where('subtitle_es','ww')->where('section','distribuidores')->orderBy('order')->get();
        return view('page.distribuidores', compact('imagen','distribuidores','provincia','mundo','pro'));
    }
    public function herramientas() {
        $herramientas = Contenido::seccionTipo('herramientas', 'texto')->orderBy('order')->get();
        return view('page.herramientas.index', compact('herramientas'));
    }
    //BUSCADOR
    public function buscar() {

        return view('page.buscador.buscar');
    }

    public function buscarstore(Request $request) {
        $busqueda  = $request->nombre;
        //$resultado = Producto::where('title_es', 'like', '%'.$busqueda.'%')->get();
        $resultado = Producto::leftJoin("familias","productos.familia_id","=","familias.id")
            ->leftjoin("tablas","productos.id","=","tablas.producto_id")
            ->Where('productos.title_es', 'like', '%'.$busqueda.'%')
            ->orWhere('productos.title_en', 'like', '%'.$busqueda.'%')
            ->orWhere('familias.title_es', 'like', '%'.$busqueda.'%')
            ->orWhere('productos.text_es', 'like', '%'.$busqueda.'%')
            ->orWhere('productos.especificaciones_es', 'like', '%'.$busqueda.'%')
            ->orWhere('tablas.a', 'like', '%'.$busqueda.'%')
            ->orWhere('tablas.b', 'like', '%'.$busqueda.'%')
            ->orWhere('tablas.c', 'like', '%'.$busqueda.'%')
            ->orWhere('tablas.d', 'like', '%'.$busqueda.'%')
            ->orWhere('tablas.e', 'like', '%'.$busqueda.'%')
            ->orWhere('tablas.f', 'like', '%'.$busqueda.'%')
            ->orWhere('tablas.j', 'like', '%'.$busqueda.'%')
            ->orWhere('tablas.h', 'like', '%'.$busqueda.'%')
            ->orWhere('tablas.i', 'like', '%'.$busqueda.'%')
            ->orWhere('tablas.j', 'like', '%'.$busqueda.'%')
            ->orWhere('tablas.k', 'like', '%'.$busqueda.'%')
            ->select('productos.*', 'tablas.a','tablas.b','tablas.c','tablas.d','tablas.e','tablas.f','tablas.g','tablas.h','tablas.i','tablas.j','tablas.k')
            ->get();
        /*$familias = Familia::where('title_es',$busqueda)->get();
        $productos = Producto::where('title_es',$busqueda)
            ->orWhere('text_es', 'like', '%' . $busqueda . '%')
            ->orWhere('especificaciones_es', 'like', '%' . $busqueda . '%')->get();
       // dd($resultado);*/
        return view('page.buscador.resultado', ['resultado' => $resultado->unique('id')]);

    }
    public function resultado() {

        return view('page.buscardor.buscar', compact('herramientas'));
    }
    //FILTRAR POR PROVINCIA
    public function filtrar(Request $request)
    {

        //$pro = ['Ciudad Autónoma de Buenos Aires (CABA)','Buenos Aires','Catamarca','Córdoba','Corrientes','Entre Ríos','Jujuy','Mendoza','La Rioja','Salta','San Juan','San Luis','Santa Fe','Santiago del Estero','Tucumán','Chaco','Chubut','Formosa','Misiones','Neuquén','La Pampa','Río Negro','Santa Cruz','Tierra del Fuego'];
        $pro = Contenido::orderBy('order')->select('provincia')->get();
        $imagen = Contenido::seccionTipo('distribuidores', 'imagen')->first();
        $distribuidores = Contenido::seccionTipo('distribuidores', 'texto')->orderBy('order')->get();
        if ($request->provincia)
        {
            $provincia = Contenido::where('provincia',$request->provincia)->orderBy('order')->get();
        }else{
            return back();
        }
        $mundo = Contenido::where('provincia',null)->where('section','distribuidores')->orderBy('order')->get();
        return view('page.distribuidores', compact('imagen','distribuidores','provincia','mundo','pro'));
    }

    //BUSCADOR GENERAL
    public function productos(){
        $resultado = Producto::leftJoin("familias","productos.familia_id","=","familias.id")
            ->leftjoin("tablas","productos.id","=","tablas.producto_id")
            ->select('productos.title_'.App::getLocale(),'productos.text_es','productos.id', 'tablas.c','tablas.d','tablas.diametro1','tablas.diametro2')
            ->get();
        return array_values($resultado->unique('id')->toArray());
    }
}
