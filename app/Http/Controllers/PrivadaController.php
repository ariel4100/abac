<?php

namespace App\Http\Controllers;

use App\Csv;
use App\Descarga;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;


class PrivadaController extends Controller
{
    public function index()
    {
        return view('privada.index');
    }

    public function calidad(Request $request)
    {
        $data1 = Csv::where('partida',$request->numero0)->first();
        $data2 = Csv::where('partida',$request->numero1)->first();
        $data3 = Csv::where('partida',$request->numero2)->first();
        $data4 = Csv::where('partida',$request->remito)->first();

        if ($data1)
        {
            return response()->download('calidad/'.$data1->partida.'.pdf');
        }
        if ($data2)
        {
            return response()->download('calidad/'.$data2->partida.'.pdf');
        }
        if ($data3)
        {
            return response()->download('calidad/'.$data3->partida.'.pdf');
        }
        if ($data4)
        {
            return response()->download('calidad/'.$data4->partida.'.pdf');
        }

         return back();
    }

    public function materiaprima()
    {

        return view('privada.materiaprima');
    }


    public function distribuidor()
    {
        $dexterior = Descarga::where('distribuidor','Exterior')->get();
        $dexclusivo = Descarga::where('distribuidor','Exclusivo')->get();
        $dnoexclusivo = Descarga::where('distribuidor','No Exclusivo')->get();

        return view('privada.distribuidor',compact('dexterior','dexclusivo','dnoexclusivo'));
    }

    // API REQUEST VUE
    public function buscar(Request $request)
    {
        $partidaComponente = Csv::where('partida','=',$request->partidacomponente)->first();
        if ($partidaComponente)
        {
            return  response()->json($partidaComponente,200);
        }else{
            return response()->json(['alert' => 'Partida de componente incorrecta']);
        }
    }
    public function partidamateriaprima(Request $request)
    {
        $partidaComponente = Csv::where('materia','=',$request->materiaprima)
            ->where('partida',$request->partidacomponente)->first();
        if ($partidaComponente)
        {
            return  response()->json($partidaComponente,200);
        }else{
            return response()->json(['alert' => 'Partida de materia prima incorrecta']);
        }
    }
    public function pdf(Request $request)
    {
        $data = Csv::find(3);
        /*$data = Csv::where('materia','=',$request->materia)
            ->where('partida',$request->partida)->first();*/
        $pdf = PDF::loadView('privada.pdf', ['data' => $data]);
        //$pdf->Output();
        //return $pdf->stream('hola.pdf',array('Attachment'=> true));
        return $pdf->download();
    }

}
