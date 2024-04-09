<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        //используется для изменений модели User
        $targetModelId = $request->only('id');
        //используется для записи на игру по user_id
        $targetUserId = $request->only('user_id');

        $user = auth()->user();

        if ($user->id === $targetModelId || $user->id === $targetUserId) {
            return $next($request);
        }

        return response()->json(['error' => 'Forbidden'], 403);
    }
}
