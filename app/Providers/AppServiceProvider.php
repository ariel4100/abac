<?php

namespace App\Providers;

use App\Contenido;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $logos = Contenido::seccionTipo('logo', 'imagen')->orderBy('order')->get();
        $datos = Contenido::seccionTipo('datos', 'texto')->orderBy('order')->get();
        $contacto = [$datos[0], $datos[1], $datos[2]];
        [$header, $favicon] = [$logos[0], $logos[1]];
        view()->share(compact(
            'header', 'favicon', 'logos', 'contacto'
        ));
    }
}
