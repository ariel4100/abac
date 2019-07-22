<?php

namespace App\Http\Controllers\adm;

use App\Calculo;
use App\Conexion;
use App\Producto;
use App\Tabla;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class CalculoController extends Controller
{
    function index()
    {
        $calculo = Calculo::all();
        $tipo = array('hembra','macho','tubo');
        $conexion = Conexion::where('diametro',true)->get();
        $conexiontipo = Conexion::where('tipo','!=',null)->get();
        return view('adm.herramienta.calculo',  compact('calculo','conexion','tipo','conexiontipo'));
    }

    function store(Request $request)
    {
        $calculo = new Calculo();
        $calculo->peso = $request->peso;
        $calculo->peso_en = $request->peso_en;
        $calculo->valor = $request->valor;
        $calculo->tipo = $request->tipo;
        $calculo->orden = $request->orden;
        $calculo->save();
        return back();
    }

    function edit($id)
    {
        $calculo = Calculo::find($id);
        return view('adm.herramienta.edit',  compact('calculo'));
    }

    function update(Request $request,$id)
    {
        $calculo = Calculo::find($id);
        $calculo->peso = $request->peso;
        $calculo->peso_en = $request->peso_en;
        $calculo->valor = $request->valor;
        $calculo->tipo = $request->tipo;
        $calculo->orden = $request->orden;
        $calculo->update();
        return redirect()->route('calculo.index');
    }



    function conexionstore(Request $request)
    {
        $conexion = new Conexion();
        $conexion->diametro = $request->diametro;
        $conexion->tipo = $request->tipo;
        $conexion->conexion = $request->conexion;
        $conexion->orden = $request->orden;
        $conexion->save();
        return back();
    }

    function conexionedit($id)
    {
        $conexion = Conexion::find($id);
        $tipo = array('hembra','macho','tubo');
        return view('adm.herramienta.conexionedit',  compact('conexion','tipo'));
    }

    function conexionupdate(Request $request,$id)
    {
        $conexion = Conexion::find($id);
        $conexion->diametro = $request->diametro;
        $conexion->tipo = $request->tipo;
        $conexion->conexion = $request->conexion;
        $conexion->orden = $request->orden;
        $conexion->update();
        return redirect()->route('calculo.index');
    }










    //Api para obtener el tipo de gas o liquido
    function gas()
    {
        if (App::getLocale() == 'es')
        {
            $gas = Calculo::where('tipo','gas')->select('id','tipo','peso','valor')->get();
        }else{
            $gas = Calculo::where('tipo','gas')->select('id','tipo','peso_en','valor')->get();
        }

        return response()->json($gas);
    }
    function liquido()
    {
        if (App::getLocale() == 'es')
        {
            $liquido = Calculo::where('tipo','liquido')->select('id','tipo','peso','valor')->get();
        }else{
            $liquido = Calculo::where('tipo','liquido')->select('id','tipo','peso_en','valor')->get();
        }


        return response()->json($liquido);
    }

    public function resultado(Request $request)
    {
//        return $request->all();
        //CAUDAL
        if($request->calculo)
        {
            //ENTRADA Y SALIDA DONDE NINGUNO ES ESPECIFICO
            if($request->diametrosalida == 'todos' && $request->tiposalida == 'todos' && $request->diametro == 'todos' && $request->tipo == 'todos')
            {
                $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                    ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                    ->where('productos.familia_id',$request->familia)

                    ->where('tablas.d','>',$request->p1)
                    ->where('tablas.f','>=',round($request->calculo))
                    /*->where('tablas.diametro2',$request->diametro)
                    ->where('tablas.tipo2',$request->tipo[0])*/
                    ->select('productos.image','productos.title_es','productos.id','tablas.c','tablas.producto_id','familias.buscado')
                    ->get();

            }
            //ENTRADA y SALIDA ESPECIFICO
            if($request->tipo  != 'todos' && $request->diametro != 'todos' && $request->diametrosalida != 'todos' && $request->tiposalida != 'todos')
            {

                $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                    ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                    ->where('productos.familia_id',$request->familia)
                    ->where('familias.buscado',true)
                    ->where('tablas.d','>',$request->p1)
                    ->where('tablas.f','>=',round($request->calculo,2))
                    ->where('tablas.diametro2',$request->diametro)
                    ->where('tablas.tipo2',$request->tipo)
                    ->select('productos.*','tablas.c','tablas.producto_id','familias.buscado')
                    ->get();
            }
            //ENTRADA ESPECIFICO
            if($request->tipo  != 'todos' && $request->diametro != 'todos' && $request->diametrosalida == 'todos' && $request->tiposalida == 'todos')
            {

                $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                    ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                    ->where('productos.familia_id',$request->familia)
                    ->where('familias.buscado',true)
                    ->where('tablas.d','>',$request->p1)
                    ->where('tablas.f','>=',round($request->calculo,2))
                    ->where('tablas.diametro1',$request->diametro)
                    ->where('tablas.tipo',$request->tipo)
                    ->select('productos.*','tablas.c','tablas.producto_id','familias.buscado')
                    ->get();
            }
            //SALIDA ESPECIFICO
            if($request->tipo  == 'todos' && $request->diametro == 'todos' && $request->diametrosalida != 'todos' && $request->tiposalida != 'todos')
            {

                $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                    ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                    ->where('productos.familia_id',$request->familia)
                    ->where('familias.buscado',true)
                    ->where('tablas.d','>',$request->p1)
                    ->where('tablas.f','>=',round($request->calculo,2))
                    ->where('tablas.diametro2',$request->diametrosalida)
                    ->where('tablas.tipo2',$request->tiposalida)
                    ->select('productos.*', 'tablas.c','tablas.producto_id','familias.buscado')
                    ->get();
            }
            //SALIDA ESPECIFICO SOLO POR TIPO
            if($request->tiposalida  != 'todos' && $request->diametro == 'todos' && $request->diametrosalida == 'todos' && $request->tipo == 'todos')
            {

                $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                    ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                    ->where('productos.familia_id',$request->familia)
                    ->where('familias.buscado',true)
                    ->where('tablas.d','>',$request->p1)
                    ->where('tablas.f','>=',round($request->calculo,2))
                    ->where('tablas.tipo2',$request->tiposalida)
                    ->select('productos.*', 'tablas.c','tablas.producto_id','familias.buscado')
                    ->get();
            }
            //ENTRADA ESPECIFICO SOLO POR TIPO
            if($request->tipo  != 'todos' && $request->diametro == 'todos' && $request->diametrosalida == 'todos' && $request->tiposalida == 'todos')
            {

                $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                    ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                    ->where('productos.familia_id',$request->familia)
                    ->where('familias.buscado',true)
                    ->where('tablas.d','>',$request->p1)
                    ->where('tablas.f','>=',round($request->calculo,2))
                    ->where('tablas.tipo',$request->tipo)
                    ->select('productos.*', 'tablas.c','tablas.producto_id','familias.buscado')
                    ->get();
            }
            //ENTRADA ESPECIFICO SOLO POR DIAMETRO
            if($request->diametro  != 'todos' && $request->tipo == 'todos' && $request->diametrosalida == 'todos' && $request->tiposalida == 'todos')
            {

                $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                    ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                    ->where('productos.familia_id',$request->familia)
                    ->where('familias.buscado',true)
                    ->where('tablas.d','>',$request->p1)
                    ->where('tablas.f','>=',round($request->calculo,2))
                    ->where('tablas.diametro1',$request->diametro)
                    ->select('productos.*', 'tablas.c','tablas.producto_id','familias.buscado')
                    ->get();
            }
            //SALIDA ESPECIFICO SOLO POR DIAMETRO
            if($request->diametrosalida  != 'todos' && $request->tipo == 'todos' && $request->diametro == 'todos' && $request->tiposalida == 'todos')
            {

                $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                    ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                    ->where('productos.familia_id',$request->familia)
                    ->where('familias.buscado',true)
                    ->where('tablas.d','>',$request->p1)
                    ->where('tablas.f','>=',round($request->calculo,2))
                    ->where('tablas.diametro2',$request->diametrosalida)
                    ->select('productos.*', 'tablas.c','tablas.producto_id','familias.buscado')
                    ->get();
            }

        }
        /*if (round($request->resultado,2) <= 0.45 )
        {
            //mm 5
            $mm = 0.45;
        }
        if (round($request->resultado,2) <= 1.20 && round($request->resultado,2) > 0.45)
        {
            //mm 8
            $mm = 1.20;
        }
        if (round($request->resultado,2) > 1.20 )
        {
            //mm 11
            $mm = 2.20;
        }*/
        if ($request->resultado)
        {

            //ENTRADA Y SALIDA DONDE NINGUNO ES ESPECIFICO
            if($request->diametrosalida == 'todos' && $request->tiposalida == 'todos' && $request->diametro == 'todos' && $request->tipo == 'todos')
            {
                $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                    ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                    ->where('productos.familia_id',$request->familia)

                    ->where('tablas.d','>',$request->p1)
                    ->where('tablas.f','>=',round($request->resultado,2))
                    /*->where('tablas.diametro2',$request->diametro)
                    ->where('tablas.tipo2',$request->tipo[0])*/
                    ->select('productos.image','productos.title_es','productos.title_en','productos.id','tablas.c','tablas.producto_id','familias.buscado')
                    ->get();

            }

            //ENTRADA y SALIDA ESPECIFICO
            if($request->tipo  != 'todos' && $request->diametro != 'todos' && $request->diametrosalida != 'todos' && $request->tiposalida != 'todos')
            {

                $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                    ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                    ->where('productos.familia_id',$request->familia)
                    ->where('familias.buscado',true)
                    ->where('tablas.d','>',$request->p1)
                    ->where('tablas.f','>=',round($request->resultado,2))
                    ->where('tablas.diametro2',$request->diametro)
                    ->where('tablas.tipo2',$request->tipo)
                    ->select('productos.*','tablas.c','tablas.producto_id','familias.buscado')
                    ->get();
            }
            //ENTRADA ESPECIFICO
            if($request->tipo  != 'todos' && $request->diametro != 'todos' && $request->diametrosalida == 'todos' && $request->tiposalida == 'todos')
            {

                $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                    ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                    ->where('productos.familia_id',$request->familia)
                    ->where('familias.buscado',true)
                    ->where('tablas.d','>',$request->p1)
                    ->where('tablas.f','>=',round($request->resultado,2))
                    ->where('tablas.diametro1',$request->diametro)
                    ->where('tablas.tipo',$request->tipo)
                    ->select('productos.*','tablas.c','tablas.producto_id','familias.buscado')
                    ->get();
            }
            //SALIDA ESPECIFICO
            if($request->tipo  == 'todos' && $request->diametro == 'todos' && $request->diametrosalida != 'todos' && $request->tiposalida != 'todos')
            {

                $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                    ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                    ->where('productos.familia_id',$request->familia)
                    ->where('familias.buscado',true)
                    ->where('tablas.d','>',$request->p1)
                    ->where('tablas.f','>=',round($request->resultado,2))
                    ->where('tablas.diametro2',$request->diametrosalida)
                    ->where('tablas.tipo2',$request->tiposalida)
                    ->select('productos.*', 'tablas.c','tablas.producto_id','familias.buscado')
                    ->get();
            }
            //SALIDA ESPECIFICO SOLO POR TIPO
            if($request->tiposalida  != 'todos' && $request->diametro == 'todos' && $request->diametrosalida == 'todos' && $request->tipo == 'todos')
            {

                $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                    ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                    ->where('productos.familia_id',$request->familia)
                    ->where('familias.buscado',true)
                    ->where('tablas.d','>',$request->p1)
                    ->where('tablas.f','>=',round($request->resultado,2))
                    ->where('tablas.tipo2',$request->tiposalida)
                    ->select('productos.*', 'tablas.c','tablas.producto_id','familias.buscado')
                    ->get();
            }
            //ENTRADA ESPECIFICO SOLO POR TIPO
            if($request->tipo  != 'todos' && $request->diametro == 'todos' && $request->diametrosalida == 'todos' && $request->tiposalida == 'todos')
            {

                $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                    ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                    ->where('productos.familia_id',$request->familia)
                    ->where('familias.buscado',true)
                    ->where('tablas.d','>',$request->p1)
                    ->where('tablas.f','>=',round($request->resultado,2))
                    ->where('tablas.tipo',$request->tipo)
                    ->select('productos.*', 'tablas.c','tablas.producto_id','familias.buscado')
                    ->get();
            }
            //ENTRADA ESPECIFICO SOLO POR DIAMETRO
            if($request->diametro  != 'todos' && $request->tipo == 'todos' && $request->diametrosalida == 'todos' && $request->tiposalida == 'todos')
            {

                $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                    ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                    ->where('productos.familia_id',$request->familia)
                    ->where('familias.buscado',true)
                    ->where('tablas.d','>',$request->p1)
                    ->where('tablas.f','>=',round($request->resultado,2))
                    ->where('tablas.diametro1',$request->diametro)
                    ->select('productos.*', 'tablas.c','tablas.producto_id','familias.buscado')
                    ->get();
            }
            //SALIDA ESPECIFICO SOLO POR DIAMETRO
            if($request->diametrosalida  != 'todos' && $request->tipo == 'todos' && $request->diametro == 'todos' && $request->tiposalida == 'todos')
            {

                $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                    ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                    ->where('productos.familia_id',$request->familia)
                    ->where('familias.buscado',true)
                    ->where('tablas.d','>',$request->p1)
                    ->where('tablas.f','>=',round($request->resultado,2))
                    ->where('tablas.diametro2',$request->diametrosalida)
                    ->select('productos.*', 'tablas.c','tablas.producto_id','familias.buscado')
                    ->get();
            }
        }
//        return $resultado;
   /*     if($request->conexion == 'entrada')
        {

            $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                ->where('productos.familia_id',$request->familia)
                ->where('familias.buscado',true)
                ->where('tablas.d','>',$request->p1)
                ->where('tablas.f','1')
                ->where('tablas.diametro1',$request->diametro)
                ->where('tablas.tipo',$request->tipo[0])
                ->select('productos.*','tablas.c','tablas.producto_id')
                ->get();

        }

*/

        //$Arr["asda"] = [[],[]];

        $filter = [];

        foreach ($resultado as $r)
        {

            if(empty($r->producto_id)) continue;
            if(!isset($filter[$r->producto_id])) {
                $filter[$r->producto_id] = [];
                $filter[$r->producto_id]["c"] = [];
                $filter[$r->producto_id]["title_es"] = $r->{'title_'.App::getLocale()};
                $filter[$r->producto_id]["image"] = $r->image;
                $filter[$r->producto_id]["id"] = $r->id;
            }
            $filter[$r->producto_id]["c"][] = $r->c;
        }


        if ($filter)
        {
            return  response()->json($filter,200);
        }
    }

    public function solofiltro(Request $request)
    {
//        return $request->data;
        if($request->dentrada  != 'todos' && $request->tentrada != 'todos' && $request->dsalida != 'todos' && $request->tsalida != 'todos')
        {

            $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                ->where('productos.familia_id',$request->familia)
                ->where('tablas.diametro1',$request->dentrada)
                ->where('tablas.diametro2',$request->dsalida)
                ->where('tablas.tipo',$request->tentrada)
                ->where('tablas.tipo2',$request->tsalida)
                ->select('productos.*','tablas.c','tablas.producto_id','familias.buscado')
                ->get();
        }
        //filtra solo por tipo y diametro de entrada
        if($request->dentrada  != 'todos' && $request->tentrada != 'todos' && $request->dsalida == 'todos' && $request->tsalida == 'todos')
        {

            $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                ->where('productos.familia_id',$request->familia)
                ->where('tablas.tipo',$request->tentrada)
                ->where('tablas.diametro1',$request->dentrada)
                ->select('productos.*','tablas.c','tablas.producto_id','familias.buscado')
                ->get();
        }
        //filtra solo por tipo y diametro de salida
        if($request->dentrada  == 'todos' && $request->tentrada == 'todos' && $request->dsalida != 'todos' && $request->tsalida != 'todos')
        {

            $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                ->where('productos.familia_id',$request->familia)
                ->where('tablas.tipo2',$request->tsalida)
                ->where('tablas.diametro2',$request->dsalida)
                ->select('productos.*','tablas.c','tablas.producto_id','familias.buscado')
                ->get();
        }
        //filtra solo por tipo de entrada
        if($request->dentrada  == 'todos' && $request->tentrada != 'todos' && $request->dsalida == 'todos' && $request->tsalida == 'todos')
        {

            $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                ->where('productos.familia_id',$request->familia)
                ->where('tablas.tipo',$request->tentrada)
                ->select('productos.*','tablas.c','tablas.producto_id','familias.buscado')
                ->get();
        }
        //filtra solo por tipo de salida
        if($request->dentrada  == 'todos' && $request->tentrada == 'todos' && $request->dsalida == 'todos' && $request->tsalida != 'todos')
        {

            $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                ->where('productos.familia_id',$request->familia)
                ->where('tablas.tipo2',$request->tsalida)
                ->select('productos.*','tablas.c','tablas.producto_id','familias.buscado')
                ->get();
        }
        //filtra solo por diametro de salida
        if($request->dentrada  == 'todos' && $request->tentrada == 'todos' && $request->dsalida != 'todos' && $request->tsalida == 'todos')
        {

            $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                ->where('productos.familia_id',$request->familia)
                ->where('tablas.diametro2',$request->dsalida)
                ->select('productos.*','tablas.c','tablas.producto_id','familias.buscado')
                ->get();
        }
        //filtra solo por diametro de entrada
        if($request->dentrada  != 'todos' && $request->tentrada == 'todos' && $request->dsalida == 'todos' && $request->tsalida == 'todos')
        {
            $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                ->where('productos.familia_id',$request->familia)
                ->where('tablas.diametro1',$request->dentrada)
                ->select('productos.*','tablas.c','tablas.producto_id','familias.buscado')
                ->get();
        }
        if($request->dentrada  == 'todos' && $request->tentrada == 'todos' && $request->dsalida == 'todos' && $request->tsalida == 'todos')
        {

            $resultado = Producto::leftJoin('tablas', 'tablas.producto_id', '=', 'productos.id')
                ->leftJoin('familias', 'familias.id', '=', 'productos.familia_id')
                ->where('productos.familia_id',$request->familia)
                ->select('productos.*','tablas.c','tablas.producto_id','familias.buscado')
                ->get();
        }


        $filter = [];

        foreach ($resultado as $r)
        {

            if(empty($r->producto_id)) continue;
            if(!isset($filter[$r->producto_id])) {
                $filter[$r->producto_id] = [];
                $filter[$r->producto_id]["c"] = [];
                $filter[$r->producto_id]["title_es"] = $r->{'title_'.App::getLocale()};
                $filter[$r->producto_id]["image"] = $r->image;
                $filter[$r->producto_id]["id"] = $r->id;
            }
            $filter[$r->producto_id]["c"][] = $r->c;
        }

        if ($filter)
        {
            return  response()->json($filter,200);
        }
    }

}
