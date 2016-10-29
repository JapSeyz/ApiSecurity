<?php

namespace JapSeyz\ApiSecurity;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class LaravelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app[ 'router' ]->middleware('api.check', Check::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
