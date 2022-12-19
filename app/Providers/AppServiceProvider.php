<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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
        //
        Blade::if('admin', function (){
            if(Auth::check() && Auth::user()->role->id == 1){
                return 1;
            }
            return 0;
        });

        Blade::if('customer', function (){
            if(Auth::check() && Auth::user()->role->id == 2){
                return 1;
            }
            return 0;
        });
    }
}
