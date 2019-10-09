<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use App\User;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function access(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (!empty($user)) {

            // if ($user->discriminator == "employer") {
            //     $company = Company::where('user_id', $user->id)
            //         ->where('status', true)->first();

            //     if (empty($company)) {
            //         return response()->json([
            //             'status' => 'Tu compañía aun se encuentra en proceso de activación'
            //         ], 401);
            //     }
            // }

            if (Hash::check($request->input('password'), $user->makeVisible(['password'])->password)) {
                return response()->json([
                    'token' => $this->jwt($user)
                ]);
            } else {
                return response()->json(['error' => 'Password is incorrect'], 401);
            }
        } else {

            return response()->json([
                'error' => 'Email does not exist'
            ], 400);
        }
    }

    protected function jwt(User $user)
    {
        $payload = [
            'iss' => "cabrera-business", // Issuer of the token
            'sub' => $user->id, // Subject of the token
            'iat' => time(), // Time when JWT was issued. 
            'exp' => time() + 60 * 60, // Expiration time             
            'data' => $user->discriminator
        ];

        // As you can see we are passing `JWT_SECRET` as the second parameter that will 
        // be used to decode the token in the future.
        return JWT::encode($payload, env('JWT_SECRET'));
    }

    public function refresh(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        $user = User::find(base64_decode($request->input('token')))->first();

        return response()->json([
            'token' => $this->jwt($user)
        ]);
    }
}
