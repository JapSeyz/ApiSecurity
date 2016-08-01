<?php

namespace JapSeyz\ApiSecurity;

use Closure;
use JapSeyz\ApiSecurity\Utils;

class Check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (env('JAPSEYZ_APISECURITY_CHECK_AUTH', false)) {
            if (auth()->check()) {
                return $next($request);
            }
        }

        // Make sure an Api token is provided
        if (!$request->headers->has('api-token')) {
            return response()->json([
                'status'  => 'error',
                'message' => 'API-token not found',
            ], 403);
        }

        // Parse the Token
        if (Utils::parseAPIToken($request->header('api-token'))) {
            // The parse was successful, continue
            return $next($request);
        }

        // Unsuccessful parse
        return response()->json([
            'status'  => 'error',
            'message' => 'Invalid API-token',
        ], 403);
    }
}