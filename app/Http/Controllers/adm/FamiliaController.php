<?php

namespace App\Http\Controllers\Adm;

use App\Familia;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class FamiliaController extends Controller
{
    public function index() {
        $familias = Familia::orderBy('order')->paginate(8);
        return view('adm.familias.index', compact('familias'));
    }

    public function create() {
        return view('adm.familias.create');
    }

    public function store(Request $request) {
        $data = $request->all();

        isset($data['buscado']) ? $data['buscado'] = true : $data['buscado'] = false;
        $file_save = Helpers::saveImage($request->file('image'), 'familias');
        $file_save ? $data['image'] = $file_save : false;

        Familia::create($data);
        $success = 'Familia creado con éxito';

        return back()->with('success', $success);
    }

    public function edit(Familia $familia) {
        return view('adm.familias.edit', compact('familia'));
    }

    public function update(Request $request, Familia $familia) {
        $data = $request->all();
        //dd($request->all());
        isset($data['buscado']) ? $data['buscado'] = true : $data['buscado'] = false;
        $file_save = Helpers::saveImage($request->file('image'), 'familias');
        $file_save ? $data['image'] = $file_save : false;

        $familia->update($data);

        $success = 'Registro editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy(Familia $familia) {
        $familia->delete();

        $success = 'Registro eliminado correctamente';
        return back()->with('success', $success);
    }
    public function apifamilia()
    {
        //dd(App::getLocale());
        $familia = Familia::select('id','buscado','descripcion_'.App::getLocale(),'title_'.App::getLocale(),'image')->get();

        /*$familia = [];
        foreach ($familia1 as $item)
        {
            array_push($familia,[$item->title_es]);
        }*/
        //$familia =
        if ($familia)
        {
            //dd($familia);
            return  response()->json($familia,200);
        }else{
            return response()->json(['alert' => 'Partida de materia prima incorrecta']);
        }
    }
}
