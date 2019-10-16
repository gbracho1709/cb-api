<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user($request)
    {
        $officeUser = OfficeUser::where('owner', $request)
            ->with('user')
            ->get();
        return response()->json($officeUser);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function office($request)
    {
        $officeUser = OfficeUser::where('user', $request)
            ->with('office')
            ->get();
        return response()->json($officeUser);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user' => 'required',
            'office' => 'required',
            'owner' => 'required'
        ]);

        $user = OfficeUser::find($id);
        $user->user = $request->user;
        $user->office = $request->office;
        $user->owner = $request->owner;
        $user->save();

        return response()->json($user);
    }
}
