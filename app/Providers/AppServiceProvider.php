<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.template', function($view){
            $desarrolladoras = \App\Desarrolladora::count();

            $view->with(['desarrolladoras'=> $desarrolladoras]);
        });

        view()->composer('layouts.template', function($view){
            $clasificaciones = \App\Clasificacion::count();

            $view->with(['clasificaciones'=> $clasificaciones]);
        });
        
        view()->composer('layouts.template', function($view){
            $generos = \App\Genero::count();

            $view->with(['generos'=> $generos]);
        });

        view()->composer('layouts.template', function($view){
            $juegos = \App\Juego::count();

            $view->with(['juegos'=> $juegos]);
        });
    }
}
