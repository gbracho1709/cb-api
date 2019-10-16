<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shareholder;

class ShareholderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shareholder = Shareholder::All();
        return response()->json($shareholder);
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

        $shareholder = new Shareholder;
        $shareholder->name = $request->name;
        $shareholder->title = $request->title;
        $shareholder->securitySocial = $request->securitysocial;
        $shareholder->address = $request->address;
        $shareholder->cityId = $request->city;
        $shareholder->zip = $request->zip;
        $shareholder->birthDay = $request->birthday;
        $shareholder->share = $request->share;
        $shareholder->email = $request->email;
        $shareholder->phone = $request->phone;
        $shareholder->reference = $request->corporate;
        $shareholder->save();

        return response()->json($shareholder);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shareholder = Shareholder::where('reference', $id)->get();
        return response()->json($shareholder);
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

        $shareholder = Shareholder::find($id);
        $shareholder->name = $request->name;
        $shareholder->title = $request->title;
        $shareholder->securitySocial = $request->securitysocial;
        $shareholder->address = $request->address;
        $shareholder->cityId = $request->city;
        $shareholder->zip = $request->zip;
        $shareholder->birthDay = $request->birthday;
        $shareholder->share = $request->share;
        $shareholder->email = $request->email;
        $shareholder->phone = $request->phone;
        $shareholder->reference = $request->corporate;
        $shareholder->save();

        return response()->json($shareholder);
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
