<?php

namespace App\Http\Controllers;

use App\Csv;
use App\Descarga;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PrivadaController extends Controller
{
    public function index()
    {
        return view('privada.index');
    }

    public function calidadindex()
    {
        return view('privada.calidad');
    }

    public function solicitud(Request $request)
    {
        //falta mensaje

        return back()->with('alert','Enviado correctamente');
    }

    public function calidad(Request $request)
    {
//        dd($request->numero0);
//        $data1 = Csv::where('partida',$request->numero0)->first();

        if ($request->numero0)
        {
//            $path = public_path($request->numero0);
//            dd($path);
            if (File::exists('calidad/'.$request->numero0.'.pdf')){
                return response()->download('calidad/'.$request->numero0.'.pdf');
            } else {
                $err = __('Engraved number not found');
                return back()->with('alert', $err);
            }
        }else{
            $err = __('Engraved number not found');
            return back()->with('alert', $err);
        }



    }

    public function solicitarcertificado(Request $request)
    {


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
        set_time_limit(300);
        //$data = Csv::find(2);
        $data = Csv::where('materia','=',$request->materia)
            ->where('partida',$request->partida)->first();
        $pdf = PDF::loadView('privada.pdf', ['data' => $data]);
        $nombre = uniqid().'doc.pdf';
        $pdf->save('files/pdf/'.$nombre);

        return response()->download('files/pdf/'.$nombre);

        //$output = $pdf->output();
        //file_put_contents( '/files', $output);
        //return $pdf->stream('hola.pdf',array('Attachment'=> true));
        //return $pdf->download();
    }

    public function descarga(Request $request){
        set_time_limit(300);

        if ($request->materia)
        {
//            $path = public_path($request->numero0);
//            dd($path);
            if (File::exists('materiaprima/'.$request->materia.'.pdf')){
                return response()->download('materiaprima/'.$request->materia.'.pdf');
            } else {
                $err = __('Engraved number not found');
                return back()->with('alert', $err);
            }
        }else{
            $err = __('Engraved number not found');
            return back()->with('alert', $err);
        }
//        return response()->download("materiaprima/$request->materia.pdf");
    }

}
