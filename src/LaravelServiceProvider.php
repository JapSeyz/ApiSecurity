<?php

namespace JapSeyz\ApiSecurity;

use Illuminate\Support\ServiceProvider;
use JapSeyz\ApiSecurity\Middleware;

class LaravelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app[ 'router' ]->middleware([
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
        Route::group(['middleware' => 'throttle:15,1'], function () {
            Route::get('/api/timestamp', function () {
                return response()->json([
                    'timestamp' => time(),
                ]);
            });
        });
    }
}