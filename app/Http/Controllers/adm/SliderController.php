<?php

namespace App\Http\Controllers\adm;

use App\Slider;
use App\Extensions\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function create($section)
    {
        return view('adm.sliders.create', compact('section'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $file_save = Helpers::saveImage($request->file('image'), 'sliders');
        $file_save ? $data['image'] = $file_save : false;

        Slider::create($data);
        $success = 'Slider creado con éxito';

        return back()->with('success', $success);
    }

    public function show($seccion)
    {
        $sliders = Slider::where('section', $seccion)->orderBy('order')->paginate(8);
        return view('adm.sliders.show', compact('sliders'));
    }

    public function edit(Slider $slider)
    {
        return view('adm.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $data = $request->all();

        $file_save = Helpers::saveImage($request->file('image'), 'sliders');
        $file_save ? $data['image'] = $file_save : false;

        $slider->update($data);
        
        $success = 'Registro editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        
        $success = 'Registro eliminado correctamente';
        return back()->with('success', $success);
    }
}
