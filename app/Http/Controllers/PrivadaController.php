<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivadaController extends Controller
{
    public function index()
    {
        return view('privada.index');
    }

    public function materiaprima()
    {
        return view('privada.materiaprima');
    }


    public function distribuidor()
    {
        return view('privada.distribuidor');
    }
}
