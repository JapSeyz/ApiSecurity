<?php

namespace JapSeyz\ApiSecurity;

use Illuminate\Support\ServiceProvider;
use JapSeyz\ApiSecurity\Check;
use JapSeyz\ApiSecurity\ThrottleRequests;

class LumenServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->routeMiddleware([
            'api.check' => Check::class,
        ]);

        $app->routeMiddleware([
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
    	$this->app->group(['group' => 'throttle:15,1'], function() use($app){
	    		$this->app->get('/api/timestamp', function(){
						return response()->json([
								'timestamp' => time()
							]);
					});
    	})
    }
}