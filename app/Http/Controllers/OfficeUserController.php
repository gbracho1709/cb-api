<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\OfficeUser;

class OfficeUserController extends Controller
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
        $officeUser = OfficeUser::where('owner', $request)
            ->with('user')
            ->get();
        return response()->json($officeUser);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user' => 'required',
            'office' => 'required',
            'owner' => 'required'
        ]);

        $user = new OfficeUser;
        $user->user = $request->user;
        $user->office = $request->office;
        $user->owner = $request->owner;
        $user->save();

        return response()->json($user);
    }
}
