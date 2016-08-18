<?php

namespace JapSeyz\ApiSecurity;

use Illuminate\Support\ServiceProvider;

class LaravelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app[ 'router' ]->middleware([
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
        Route::get('/api/timestamp', function () {
            return response()->json([
                'timestamp' => time(),
            ]);
        });
    }
}
