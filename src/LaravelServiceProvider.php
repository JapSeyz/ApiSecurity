<?php

namespace JapSeyz\ApiSecurity;

use Illuminate\Support\ServiceProvider;
use JapSeyz\ApiSecurity\Middleware;

class ServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->routeMiddleware([
            'api.check' => Middleware::class,
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Route::get('/api/timestamp', function(){
        	return time();
        });
    }
}