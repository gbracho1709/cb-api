<?php

namespace App\Providers;

use App\User;
use Firebase\JWT\JWT;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {
            if ($request->header('Authorization')) {
                $token = $request->header('Authorization');
                if ($token) {
                    try {
                        $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);                        
                        return  User::find($credentials->sub)->first();
                    } catch (ExpiredException $e) {
                        return response()->json([
                            'error' => 'Provided token is expired.'
                        ], 400);
                    } catch (Exception $e) {
                        return response()->json([
                            'error' => 'An error while decoding token.'
                        ], 400);
                    }
                }
            }
        });
    }
}
