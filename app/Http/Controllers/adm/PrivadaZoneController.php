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
use Illuminate\Support\Facades\Session;

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
        ///////////////////
        // Subir CSV
        /////////////////// 
        set_time_limit(0);
        ini_set('memory_limit', '-1');
        $request->validate([
            'csv' => 'required',
        ]);

        //
        // Obtiene las partidas existentes
        $partidas = DB::table('csvs')->pluck('partida')->toArray();

        //
        // Ruta donde se guarda el CSV
        $path = $request->file('csv')->getRealPath();

        //
        // Convierte un string con formato CSV a un array
        $data = array_map('str_getcsv', file($path));

        //
        // Se convierte en coleccion la data (collect) y se extrae la primera columna (pluck)
        $valores = collect($data)->pluck(0);

        //
        // Se crea un contador
        $counter = [
            'created' => 0,
            'updated' => 0
        ];

        //
        // se abre un bloque de try/catch
        try {
            // Se inicia una transacción
            DB::beginTransaction();

            //
            // se iteran los registros
            foreach ($valores as $value) {
                //
                // Se convierte el string a un array por cada (;)
                $ss = explode(';',$value);

                //
                // Se verifica si existe la partida guardada en la base de datos
                if (!in_array($ss[0], $partidas)):
                    DB::table('csvs')->insert([
                        'partida' => $ss[0],
                        'materia' => $ss[1],
                        'articulo' => $ss[2],
                        'descripcion' => utf8_encode($ss[3]),
                    ]);
                    $partidas[] = $ss[0];
                    $counter['created']++; 
                else:
                    DB::table('csvs')
                        ->where('partida', $ss[0])
                        ->update([
                            'materia' => $ss[1],
                            'articulo' => $ss[2],
                            'descripcion' => utf8_encode($ss[3]),
                        ]);
                    $counter['updated']++; 
                endif;
            }

            //
            // Se confirma la transacción
            DB::commit();
        } catch (\Exception $e) {
            //
            // Si se encuentra algun error, se cancela la transacción
            DB::rollback();
            
            //
            // arroja el error.
            return redirect()->back()->with('alert', $e->getMessage());
        }

        //if (ob_get_contents()) ob_clean();
        // return redirect()->back()->with('alert', 'Se Cargo correctamente');
        //return redirect()->back()->send();
        Session::flash('alert', 'Se Cargo correctamente');

        exit(redirect()->back()->with('alert', 'Se Cargo correctamente'));
        ///header('Location: ' . $_SERVER['HTTP_REFERER']);
        ///////////////////
        // Fin de Subir CSV
        /////////////////// 
    }
}
