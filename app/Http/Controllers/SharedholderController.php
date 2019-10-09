<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sharedholder;

class SharedholderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sharedholder = Sharedholder::All();
        return response()->json($sharedholder);
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
            'name' => 'required',
            'title' => 'required',
            'securitysocial' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'birthday' => 'required|date',
            'share' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'corporate' => 'required'
        ]);

        $sharedholder = new Sharedholder;
        $sharedholder->name = $request->name;
        $sharedholder->title = $request->title;
        $sharedholder->securitySocial = $request->securitysocial;
        $sharedholder->address = $request->address;
        $sharedholder->cityId = $request->city;
        $sharedholder->zip = $request->zip;
        $sharedholder->birthDay = $request->birthday;
        $sharedholder->share = $request->share;
        $sharedholder->email = $request->email;
        $sharedholder->phone = $request->phone;
        $sharedholder->corporateRef = $request->corporate;
        $sharedholder->save();

        return response()->json($sharedholder);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sharedholder = Sharedholder::where('corporateRef', $id)->get();
        return response()->json($sharedholder);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'securitysocial' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'birthday' => 'required|date',
            'share' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'corporate' => 'required'
        ]);

        $sharedholder = Sharedholder::find($id);
        $sharedholder->name = $request->name;
        $sharedholder->title = $request->title;
        $sharedholder->securitySocial = $request->securitysocial;
        $sharedholder->address = $request->address;
        $sharedholder->cityId = $request->city;
        $sharedholder->zip = $request->zip;
        $sharedholder->birthDay = $request->birthday;
        $sharedholder->share = $request->share;
        $sharedholder->email = $request->email;
        $sharedholder->phone = $request->phone;
        $sharedholder->corporateRef = $request->corporate;
        $sharedholder->save();

        return response()->json($sharedholder);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
