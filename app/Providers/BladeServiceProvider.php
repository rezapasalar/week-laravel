<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if("fa", fn () => str_replace('_', '-', app()->getLocale()) == 'fa');

        Blade::if('active', fn ($name) => request()->routeIs($name));

        Blade::if('cans', function (Array $permissions) {
            foreach ($permissions as $permission) {
                if(Gate::allows($permission)){
                    return true;
                }
            }

            return false;
        });
    }
}
