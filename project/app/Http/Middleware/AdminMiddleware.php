<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function     handle($request, Closure $next): mixed
    {
        $user = auth()->user();

        if($user->is_admin){
            return $next($request);
        }

        return response()->json(['error' => 'Forbidden'], 403);


    }
}
