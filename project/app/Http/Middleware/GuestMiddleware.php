<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next): mixed
    {
        try {
            JWTAuth::parseToken()->authenticate();

            return response()->json(['error' => 'Already authorized'], 403);
        } catch (\Exception $e) {
            return $next($request);
        }
    }
}
