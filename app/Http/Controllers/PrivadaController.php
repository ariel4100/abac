<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivadaController extends Controller
{
    public function index() {
        return view('privada.index');
    }
}
