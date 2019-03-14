<?php

namespace App\Http\Controllers\adm;

use App\csv;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;


class PrivadaZoneController extends Controller
{
    public function index() {
        return view('adm.privada.index');
    }
    public function edit() {
        return view('adm.privada.index');
    }
    public function csv() {
        return view('adm.privada.csv');
    }

    public function csvstore(Request $request)
    {

        //$contents = Storage::get('csv/csv.csv');
        $path = $request->file('csv')->getRealPath();
        //$data = Excel::load($path)->get();

        $data = array_map('str_getcsv', file($path));
        $csv_data = array_slice($data, 0, 3);
        //return view('import_fields', compact('csv_data'));
        for ($i=0;$i<count($data);$i++)
        {
            $data[$i] = explode(';',$data[$i][0]);
            csv::create([
                'partida' => $data[$i][0],
                'materia' => $data[$i][1],
                'articulo' => $data[$i][2],
                'descripcion' => $data[$i][3],
            ]);
        }
        return redirect()->back()->with('alert','Se Cargo correctamente');


        /*if($request->file('csv')!=null)
        {

            $ruta                 = 'csv';
            $path                 = Storage::putFileAs($ruta, $request->file('csv'),'csv'.'.'.$request->file('csv')->getClientOriginalExtension());
            $rutaNombre           = 'csv'.'.'.$request->file('csv')->getClientOriginalExtension();
            return dd($rutaNombre);
        }else{
            return 'no va';
        }*/
/*
        if ($path) {
            $data = Excel::load($path, function($reader) {})->get()->toArray();
        } else {
            $data = array_map('str_getcsv', file($path));
        }
*/

    }
}
