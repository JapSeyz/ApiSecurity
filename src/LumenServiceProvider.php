<?php

namespace JapSeyz\ApiSecurity;

use Illuminate\Support\ServiceProvider;

class LumenServiceProvider extends ServiceProvider
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
