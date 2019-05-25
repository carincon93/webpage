<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

use App\Informacion;
use App\Servicio;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Route::resourceVerbs([
            'create' => 'crear',
            'edit' => 'editar',
        ]);

        // Using Closure based composers...
        View::composer('layouts.app', function ($view) {
            $informacion    = Informacion::where('tipoInformacion', 'footer_sitio')->first();
            $servicios      = Servicio::all();
            $view->with('informacion', $informacion)->with('servicios', $servicios);
        });
    }
}
