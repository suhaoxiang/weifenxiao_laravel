<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MenuSericeProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
            return $view->with('title','sdfsdf');
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
