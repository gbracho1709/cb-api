<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Credential;

class CredentialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $credential = Credential::All();
        return response()->json($credential);
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
            'link' => 'required|url',
            'user' => 'required',
            'password' => 'required',
            'pin' => 'required',
            'other' => 'required',
            'description' => 'required',
            'type' => 'required',
            'corporation' => 'required'
        ]);

        $credential = new Credential;
        $credential->name = $request->name;
        $credential->link = $request->link;
        $credential->user = $request->user;
        $credential->password = $request->password;
        $credential->pin = $request->pin;
        $credential->other = $request->other;
        $credential->descriptionId = $request->description;
        $credential->typeId = $request->type;
        $credential->corporationId = $request->corporation;
        $credential->save();

        return response()->json($credential);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            'link' => 'required|url',
            'user' => 'required',
            'password' => 'required',
            'pin' => 'required',
            'other' => 'required',
            'description' => 'required',
            'type' => 'required',
            'corporation' => 'required'
        ]);

        $credential = Credential::find($id);
        $credential->name = $request->name;
        $credential->link = $request->link;
        $credential->user = $request->user;
        $credential->password = $request->password;
        $credential->pin = $request->pin;
        $credential->other = $request->other;
        $credential->descriptionId = $request->description;
        $credential->typeId = $request->type;
        $credential->corporationId = $request->corporation;
        $credential->save();

        return response()->json($credential);
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
