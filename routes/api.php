<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('descargar/{file}',function ($file) {
    return response()->download("materiaprima/$file");
});
Route::post('buscar','PrivadaController@buscar');
Route::post('materia','PrivadaController@partidamateriaprima');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
