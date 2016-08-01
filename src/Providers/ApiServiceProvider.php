<?php

namespace JapSeyz\ApiSecurity\Providers;

use Illuminate\Support\ServiceProvider;
use JapSeyz\ApiSecurity\Http\Middleware\Check;

class ApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->routeMiddleware([
            'api.check' => Check::class,
        ]);
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