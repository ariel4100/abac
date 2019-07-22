<?php

namespace App\Http\Controllers\adm;

use App\Logo;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoController extends Controller
{
    public function index() {
        $logos = Logo::orderBy('order')->paginate(8);
        return view('adm.logos.index', compact('logos'));
    }

    public function edit(Logo $logo) {
        return view('adm.logos.edit', compact('logo'));
    }

    public function update(Request $request, Logo $logo) {
        $data = $request->all();
        $file_save = Helpers::saveImage($request->file('image'), 'logo');
        $file_save ? $data['image'] = $file_save : false;

        $logo->update($data);
        
        $success = 'Registro editado correctamente';
        return back()->with('success', $success);
    }
}
