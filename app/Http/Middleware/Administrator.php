<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;

class Administrator
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
        if ($credentials->data->dir != 'administrator') {
            return response('Unauthorized role', 400);
        }
        return $next($request);
    }
}
