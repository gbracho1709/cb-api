<?php

namespace App\Http\Controllers;

use App\Jobs\Transactional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\User;
use App\Utilities\Email;

class UserController extends Controller
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

    public function find($request)
    {
        $user = User::find($request)->first();
        return response()->json($user);
    }

    public function check($request)
    {
        $user = User::where('token', $request)->first();
        return response()->json($user);
    }

    public function activate(Request $request, $token)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('token', $token)->first();

        if (!empty($user)) {
            if ($user->dueDate > Carbon::now()) {
                $user->password = Hash::make($request->password);
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->isActive = true;
                $user->dueDate = null;
                $user->token = null;
                $user->save();

                return response()->json();
            }
            return response()->json(['error' => 'Expire token'], 400);
        }
        return response()->json(['error' => 'Invalid Operation.'], 400);
    }

    public function recovery(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (!empty($user)) {

            $token = str_random(50);

            User::where('email', $request->input('email'))
                ->update([
                    'token' => $token,
                    'dueDate' => Carbon::now()->addDay()
                ]);

            $data = (object) [
                'name' => $user->name,
                'email' => $user->email,
                'token' => $token
            ];
            //Send Email            
            $email = new Email();
            $email->reset($data);

            return response()->json();
        }

        return response()->json(["error" => "user not exist"], 400);
    }

    public function reset(Request $request, $token)
    {
        $this->validate($request, [
            'password' => 'required'
        ]);

        $user = User::where('token', $token)->first();

        if (!empty($user)) {
            if ($user->dueDate > Carbon::now()) {
                $user->password = Hash::make($request->password);
                $user->dueDate = null;
                $user->token = null;
                $user->save();

                return response()->json();
            }
            return response()->json(['error' => 'Expire token'], 400);
        }
        return response()->json(['error' => 'Email does not exist.'], 400);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'discriminator' => 'required'
        ]);

        $exists = User::where('email', $request->input('email'))->first();

        if (empty($exists)) {

            $user = new User;
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->discriminator = $request->discriminator;
            $user->dueDate = Carbon::now()->addHours(24);
            $user->token = str_random(45);
            $user->save();

            $this->dispatch(new Transactional($user));

            return response()->json($user);
        }

        return response()->json(["error" => "User already exists"], 400);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'discriminator' => 'required',
            'isActive' => 'required|boolean'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->discriminator = $request->discriminator;
        $user->isActive = $request->isActive;
        $user->save();
        return response()->json($user);
    }

    public function invitation(Request $request)
    { }
}
