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

Route::get('/categoria/{id}/productos','adm\ProductoController@byCategory');
//CALCULO CV
//Route::post('resultado','adm\CalculoController@resultado');

//Route::get('liquido','adm\CalculoController@liquido');
//Route::get('gas','adm\CalculoController@gas');

Route::get('conexion','adm\ConexionController@apiconexion');

Route::get('descargar','PrivadaController@pdf');


Route::get('descarga','PrivadaController@descarga');
//Route::get('descarga/{file}',function ($file) {
////    dd($file);
//    return response()->download("materiaprima/$file");
//});
Route::post('buscar','PrivadaController@buscar');
Route::post('materia','PrivadaController@partidamateriaprima');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
