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

        $this->app->routeMiddleware([
            'throttle' => ThrottleRequests::class,
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->group(['middleware' => 'throttle:15,1'], function () {
            $this->app->get('/api/timestamp', function () {
                return response()->json([
                    'timestamp' => time(),
                ]);
            });
        });
    }
}