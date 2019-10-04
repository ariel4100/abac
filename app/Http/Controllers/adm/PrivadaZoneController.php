<?php

namespace App\Http\Controllers\adm;

use App\Csv;
use App\Imports\CsvImport;
use App\Nivel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;



class PrivadaZoneController extends Controller
{
    public function index() {
        $users = User::all();
        return view('adm.privada.index',compact('users'));
    }

    public function create() {;
        //$nivel = array('s1','s2','s3');
        $nivel = Nivel::all();
        $distribuidor = array('No Exclusivo', 'Exclusivo','Exterior');
        return view('adm.privada.create',compact('nivel','distribuidor'));
    }
    public function store(Request $request) {


        $request->validate([
            'name' => ['required'],
            'username' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
            'nivel_id' => ['required'],
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->nivel_id = $request->nivel_id;
        $user->distribuidor = $request->distribuidor;

        $user->empresa = $request->empresa;
        $user->cargo = $request->cargo;
        $user->localidad = $request->localidad;
        $user->provincia = $request->provincia;
        $user->pais = $request->pais;
        $user->telefono = $request->telefono;
        $user->save();
        return back();
    }

    public function edit($id) {
        $user = User::find($id);
        //$nivel = array('s1','s2','s3');
        $nivel = Nivel::all();
        $distribuidor = array('No Exclusivo', 'Exclusivo','Exterior');
        //dd($user);
        return view('adm.privada.edit',compact('user','nivel','distribuidor'));
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
        $user->nivel_id = $request->nivel_id;
        $user->distribuidor = $request->distribuidor;
        $user->empresa = $request->empresa;
        $user->cargo = $request->cargo;
        $user->localidad = $request->localidad;
        $user->provincia = $request->provincia;
        $user->pais = $request->pais;
        $user->telefono = $request->telefono;

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
//        dd($request->all());
//        Csv::query()->truncate();
//        ini_set('max_execution_time', '0'); // for infinite time of execution
//        ini_set('memory_limit', '512MB');
        set_time_limit(0);
        ini_set('memory_limit', '-1');

        $request->validate([
            'csv' => 'required',
        ]);
        //$contents = Storage::get('csv/csv.csv');
        $path = $request->file('csv')->getRealPath();
        //$data = Excel::load($path)->get();
//        (new UsersImport)->import('users.csv', null, \Maatwebsite\Excel\Excel::CSV);

//
        $data = array_map('str_getcsv', file($path));
        $valores = collect($data)->pluck(0);
//        dd($valores);


//        foreach($valores  as $k=>$item)
//        {
//            $ss = explode(';',$item);
////            dd($ss);
//            Csv::create([
//                'partida' => $ss[0],
//                'materia' => $ss[1],
//                'articulo' => $ss[2],
//                'descripcion' => utf8_encode($ss[3]),
//            ]);
//
//        }
//        $query = "INSERT INTO `csvs` (Field1, Field2) VALUES (" . $arr[0] . "," . $arr[1] . ")";
        foreach($valores->chunk(1000)  as $k=>$item)
        {
            foreach ($item as $value)
            {
                $ss = explode(';',$value);
                DB::table('csvs')->insert(
                    [
                    'partida' => $ss[0],
                    'materia' => $ss[1],
                    'articulo' => $ss[2],
                    'descripcion' => utf8_encode($ss[3]),
                    ]
                );
    //                dd(  utf8_encode($valores[4957]));
//                Csv::firstOrCreate([
//                    'partida' => $ss[0],
//                    'materia' => $ss[1],
//                    'articulo' => $ss[2],
//                    'descripcion' => utf8_encode($ss[3]),
//                ]);

            }

        }


//        foreach($data as $k=>$Row)
//        {
////            dd($data[2],$Row);
////            $Row = str_getcsv($Row, ";");
//            $ss = explode(';',$data[$k][0]);
////            dd($ss[0]);
//            Csv::create([
//                'partida' => $ss[0],
//                'materia' => $ss[1],
//                'articulo' => $ss[2],
//                'descripcion' => $ss[3],
//            ]);
//        }




        //return view('import_fields', compact('csv_data'));
//        foreach (count($data) as $k =>$item)
//        {
//            $data[$k] = explode(';',$data[$k][0]);
//            dd($data);
//        }
//        for ($i=0;$i<count($data);$i++)
//        {
//            $data[$i] = explode(';',$data[$i][0]);
//            Csv::create([
//                'partida' => $data[$i][0],
//                'materia' => $data[$i][1],
//                'articulo' => $data[$i][2],
//                'descripcion' => $data[$i][3],
//            ]);
//        }
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
