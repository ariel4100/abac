<?php
// Productos
Route::get('/productos', 'ProductoController@index')->name('productos');
Route::get('/productos/familia/{familia}', 'ProductoController@indexProducts')->name('familias.show');
Route::get('/productos/{producto}', 'ProductoController@show')->name('productos.show');

// Public stuff
Route::get('/', 'FrontEndController@index')->name('index');
Route::get('/nosotros', 'FrontEndController@empresa')->name('empresa');
Route::get('/descargas', 'FrontEndController@descargas')->name('descargas');
Route::get('calidad/index', 'FrontEndController@calidad')->name('calidad');
Route::get('/videos', 'FrontEndController@videos')->name('videos');
Route::get('/distribuidores', 'FrontEndController@distribuidores')->name('distribuidores');
Route::get('/herramientas', 'FrontEndController@herramientas')->name('herramientas');
//buscador
Route::get('/buscador', 'FrontEndController@buscar')->name('buscador');
Route::post('/buscador/buscar', 'FrontEndController@buscarstore')->name('buscar.store');
Route::get('/herramientas', 'FrontEndController@herramientas')->name('herramientas');
// Contacto rutas
// Solo defino la ruta GET, y al momento de ir al endpoint /contacto a traves del metodo POST puedo usar el mismo nombre de la ruta,
// pero siempre cambiando el verbo
Route::get('/contacto', 'ContactoController@index')->name('contacto');
Route::post('/contacto', 'ContactoController@store');

Route::get('/contacto/trabaje-con-nosotros', 'ContactoController@showContactoWork')->name('contacto.work');
Route::post('/contacto/trabaje-con-nosotros', 'ContactoController@storeContactoWork');

Route::get('/contacto/personalizado', 'ContactoController@showPersonalizado')->name('contacto.personalizado');

// Herramientas
Route::group(['middleware' => 'auth', 'prefix' => 'herramientas'], function () {
  Route::get('/calculadora-de-cv', 'HerramientasController@calculadoraCv')->name('calculadora_cv');
  Route::get('/doblador-de-tubos', 'HerramientasController@dobladorDeTubos')->name('doblador_tubos');
});

// Novedades
Route::get('/novedades', 'NovedadesController@index')->name('novedades');
Route::get('/novedades/{categoria}/categoria', 'NovedadesController@showCategory')->name('novedades.showCategory');
Route::get('/novedad/{novedad}', 'NovedadesController@showNovedad')->name('novedades.showNovedad');

// Zona Privada
Route::group(['middleware' => 'auth', 'prefix' => 'privada', 'as' => 'privada'], function () {
    Route::get('/', 'PrivadaController@index')->name('.index');
    Route::get('/materia-prima', 'PrivadaController@materiaprima')->name('.materiaprima');
    Route::get('/distribuidor', 'PrivadaController@distribuidor')->name('.distribuidor');
    Route::post('/buscar/calidad', ['uses' => 'PrivadaController@calidad', 'as' => '.calidad.store']);
});

// Download files
Route::get('/download/{file}', function($file) {
  return response()->download('files/contenido/'.$file, $file);
})->name('downloadFile');

Route::get('pdf', 'PrivadaController@pdf')->name('pdf');

Route::get('descarga/download/{file}', function($file) {
    return response()->download('files/descarga/'.$file, $file);
})->name('downloadFiledistribuidores');

// Language settings
Route::get('setlocale/{locale}', function ($locale) {
  if (in_array($locale, \Config::get('app.locales'))) {
      Session::put('locale', $locale);
  }
  return redirect()->back();
})->name('locale');


// Acesso de cliente
Route::get('/acceso', function(){
  return view('privada.index');
})->name('acceso');

// Rutas de autenticacion, zona de ADM y demas
Route::get('/adm/login', 'Auth\Admin\LoginController@showLoginForm')->name('adm.login');
Route::post('/adm/login', 'Auth\Admin\LoginController@login');
Auth::routes();

Route::group(['middleware' => 'auth:admin', 'prefix' => 'adm'], function () {
    Route::get('/', function() {
        return redirect(route('adm.dashboard'));
    });

    Route::get('/dashboard', function() {
        return view('adm.dashboard');
    })->name('adm.dashboard');

    Route::group(['prefix' => 'slider', 'as' => 'slider'], function() {
        Route::get('{seccion}/create', ['uses' => 'adm\SliderController@create', 'as' => '.create']);
        Route::post('store', ['uses' => 'adm\SliderController@store', 'as' => '.store']);
        Route::get('{seccion}/show', ['uses' => 'adm\SliderController@show', 'as' => '.show']);
        Route::get('edit/{slider}', ['uses' => 'adm\SliderController@edit', 'as' => '.edit']);
        Route::put('update/{slider}', ['uses' => 'adm\SliderController@update', 'as' => '.update']);
        Route::delete('destroy/{slider}', ['uses' => 'adm\SliderController@destroy', 'as' => '.destroy']);
      });

      Route::group(['prefix' => 'familia', 'as' => 'familia'], function() {
        Route::get('', ['uses' => 'adm\FamiliaController@index', 'as' => '.index']);
        Route::get('create', ['uses' => 'adm\FamiliaController@create', 'as' => '.create']);
        Route::post('store', ['uses' => 'adm\FamiliaController@store', 'as' => '.store']);
        Route::get('{familia}/edit', ['uses' => 'adm\FamiliaController@edit', 'as' => '.edit']);
        Route::put('{familia}/update', ['uses' => 'adm\FamiliaController@update', 'as' => '.update']);
        Route::delete('{familia}/destroy', ['uses' => 'adm\FamiliaController@destroy', 'as' => '.destroy']);
      });

      Route::group(['prefix' => 'producto', 'as' => 'producto'], function() {
        Route::get('', ['uses' => 'adm\ProductoController@index', 'as' => '.index']);
        Route::get('{familia}/show', ['uses' => 'adm\ProductoController@show', 'as' => '.show']);
        Route::get('create', ['uses' => 'adm\ProductoController@create', 'as' => '.create']);
        Route::post('store', ['uses' => 'adm\ProductoController@store', 'as' => '.store']);
        Route::get('{producto}/edit', ['uses' => 'adm\ProductoController@edit', 'as' => '.edit']);
        Route::put('{producto}/update', ['uses' => 'adm\ProductoController@update', 'as' => '.update']);
        Route::delete('{producto}/destroy', ['uses' => 'adm\ProductoController@destroy', 'as' => '.destroy']);

          // GALERIAS DE PRODUCTOS
          Route::get('pro/{id}/galeria', ['uses' => 'adm\GaleriaController@show', 'as' => '.galeria']);
          Route::get('/crear/galeria/{id}', ['uses' => 'adm\GaleriaController@create', 'as' => '.galeria.create']);
          Route::post('galeria/store', ['uses' => 'adm\GaleriaController@store', 'as' => '.galeria.store']);
          Route::get('/editar/galeria/{id}', ['uses' => 'adm\GaleriaController@edit', 'as' => '.galeria.edit']);
          Route::put('galeria/actualizar/{id}', ['uses' => 'adm\GaleriaController@update', 'as' => '.galeria.update']);
          Route::get('galeria/eliminar/{id}', ['uses' => 'adm\GaleriaController@eliminar', 'as' => '.galeria.eliminar']);

        // TABLAS DE ESPECIFICACIONES DEL PRODUCTOS
          Route::get('/tabla/{id}', ['uses' => 'adm\ProductoController@tabla', 'as' => '.tabla']);
          Route::post('tabla/crear', ['uses' => 'adm\ProductoController@tablastore', 'as' => '.tabla.store']);
          Route::put('tabla/actualizar/{id}', ['uses' => 'adm\ProductoController@tablaupdate', 'as' => '.tabla.update']);
          Route::get('tabla/{id}/eliminar', ['uses' => 'adm\ProductoController@tabladestroy', 'as' => '.tabla.eliminar']);
      });

      Route::group(['prefix' => 'categorias', 'as' => 'categoria'], function() {
        Route::get('', ['uses' => 'adm\CategoriaController@index', 'as' => '.index']);
        Route::get('create', ['uses' => 'adm\CategoriaController@create', 'as' => '.create']);
        Route::post('store', ['uses' => 'adm\CategoriaController@store', 'as' => '.store']);
        Route::get('{categoria}/edit', ['uses' => 'adm\CategoriaController@edit', 'as' => '.edit']);
        Route::put('{categoria}/update', ['uses' => 'adm\CategoriaController@update', 'as' => '.update']);
        Route::delete('{categoria}/destroy', ['uses' => 'adm\CategoriaController@destroy', 'as' => '.destroy']);
      });

      Route::group(['prefix' => 'novedad', 'as' => 'novedad'], function() {
        Route::get('', ['uses' => 'adm\NovedadController@index', 'as' => '.index']);
        Route::get('{categoria}/show', ['uses' => 'adm\NovedadController@show', 'as' => '.show']);
        Route::get('create', ['uses' => 'adm\NovedadController@create', 'as' => '.create']);
        Route::post('store', ['uses' => 'adm\NovedadController@store', 'as' => '.store']);
        Route::get('{novedad}/edit', ['uses' => 'adm\NovedadController@edit', 'as' => '.edit']);
        Route::put('{novedad}/update', ['uses' => 'adm\NovedadController@update', 'as' => '.update']);
        Route::delete('{novedad}/destroy', ['uses' => 'adm\NovedadController@destroy', 'as' => '.destroy']);
      });

    Route::group(['prefix' => 'contenido', 'as' => 'contenido'], function() {
        Route::get('{section}/{tipo}', ['uses' => 'adm\ContenidoController@index', 'as' => '.index']);
        Route::get('{section}/{tipo}/create', ['uses' => 'adm\ContenidoController@create', 'as' => '.create']);
        Route::post('/store', ['uses' => 'adm\ContenidoController@store', 'as' => '.store']);
        Route::get('{section}/{contenido}/edit', ['uses' => 'adm\ContenidoController@edit', 'as' => '.edit']);
        Route::put('{contenido}/update', ['uses' => 'adm\ContenidoController@update', 'as' => '.update']);
        Route::delete('{contenido}/destroy', ['uses' => 'adm\ContenidoController@destroy', 'as' => '.destroy']);
        // calidad
        Route::get('ver/calidad/index', ['uses' => 'adm\CalidadController@index', 'as' => '.calidad.index']);
        Route::get('ver/calidad/crear', ['uses' => 'adm\CalidadController@create', 'as' => '.calidad.create']);
        Route::post('ver/calidad/cargar', ['uses' => 'adm\CalidadController@store', 'as' => '.calidad.store']);
        Route::get('ver/calidad/editar/{id}', ['uses' => 'adm\CalidadController@edit', 'as' => '.calidad.edit']);
        Route::put('ver/calidad/actualizar/{id}', ['uses' => 'adm\CalidadController@update', 'as' => '.calidad.update']);
        Route::get('eliminar/calidad//{id}', ['uses' => 'adm\CalidadController@eliminar', 'as' => '.calidad.eliminar']);
      });
    //Ruta para la gestión de metadatos
    Route::resource('metadatos', 'adm\MetadatoController');

    //ZONA PRIVADA ADM
    Route::group(['prefix' => 'usuario', 'as' => 'usuario'], function() {
        Route::get('/index', ['uses' => 'adm\UserController@index', 'as' => '.principal']);
        Route::get('editar/{id}', ['uses' => 'adm\UserController@edit', 'as' => '.edit']);
        Route::get('crear', ['uses' => 'adm\UserController@create', 'as' => '.create']);
        Route::post('/crear/usuario', ['uses' => 'adm\UserController@store', 'as' => '.store']);
        //Usuarios
        Route::put('actualizar/{id}', ['uses' => 'adm\UserController@update', 'as' => '.update']);
        Route::get('destroy/{id}', ['uses' => 'adm\UserController@eliminar', 'as' => '.eliminar']);
    });
    //ZONA PRIVADA ADM
    Route::group(['prefix' => 'privada', 'as' => 'privada'], function() {
        Route::get('/index', ['uses' => 'adm\PrivadaZoneController@index', 'as' => '.principal']);
        Route::get('editar/{id}', ['uses' => 'adm\PrivadaZoneController@edit', 'as' => '.edit']);
        Route::get('crear', ['uses' => 'adm\PrivadaZoneController@create', 'as' => '.create']);
        Route::post('/crear/cliente', ['uses' => 'adm\PrivadaZoneController@store', 'as' => '.store']);
        Route::get('/csv', ['uses' => 'adm\PrivadaZoneController@csv', 'as' => '.csv']);
        Route::post('/csv/cargar', ['uses' => 'adm\PrivadaZoneController@csvstore', 'as' => '.csv.store']);
        //cliente
        Route::put('actualizar/{id}', ['uses' => 'adm\PrivadaZoneController@update', 'as' => '.update']);
        Route::get('destroy/{id}', ['uses' => 'adm\PrivadaZoneController@eliminar', 'as' => '.eliminar']);

        //Descarga para los distribuidores
        Route::get('/descarga', ['uses' => 'adm\DescargaController@index', 'as' => '.descarga']);
        Route::get('/descarga/crear', ['uses' => 'adm\DescargaController@create', 'as' => '.descarga.create']);
        Route::post('/descarga/crear/store', ['uses' => 'adm\DescargaController@store', 'as' => '.descarga.store']);
        Route::get('/descarga/editar/{id}', ['uses' => 'adm\DescargaController@edit', 'as' => '.descarga.edit']);
        Route::put('/descarga/actualizar/{id}', ['uses' => 'adm\DescargaController@update', 'as' => '.descarga.update']);
        Route::get('eliminar/descarga/{id}', ['uses' => 'adm\DescargaController@eliminar', 'as' => '.descarga.eliminar']);
    });

      Route::get('privada/register', 'Auth\Admin\RegisterController@showRegistrationForm')->name('adm.register');
      Route::post('privada/register', 'Auth\Admin\RegisterController@register');

});