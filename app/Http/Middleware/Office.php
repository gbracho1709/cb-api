<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;

class Office
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('Authorization');
        $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
        if ($credentials->data != 'office') {
            return response('Unauthorized role', 401);
        }
        return $next($request);
    }
}
