<?php

namespace App\Http\Controllers\adm;

use App\csv;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;


class PrivadaZoneController extends Controller
{
    public function index() {
        $users = User::all();
        return view('adm.privada.index',compact('users'));
    }
    public function edit($id) {
        $user = User::find($id);
        $nivel = array('s1','s2','s3');
        //dd($user);
        return view('adm.privada.edit',compact('user','nivel'));
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        if ($request->password)
        {
            $user->password = $request->password;
        }
        $user->email = $request->email;
        $user->nivel = $request->nivel;
        $user->update();
        return redirect()->route('privada.principal');
    }


    public function eliminar($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('alert','se elimino correctamente');
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
