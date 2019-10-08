<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CredentialBank;

class CredentialBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $credentialbank = CredentialBank::All();
        return response()->json($credentialbank);
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
            'bank' => 'required',
            'link' => 'required|url',
            'type' => 'required',
            'user' => 'required',
            'password' => 'required',
            'routing' => 'required',
            'account' => 'required',
            'corporate' => 'required'
        ]);

        $credentialbank = new CredentialBank;
        $credentialbank->bankId = $request->bank;
        $credentialbank->link = $request->link;
        $credentialbank->typeId = $request->type;
        $credentialbank->user = $request->user;
        $credentialbank->password = $request->password;
        $credentialbank->routing = $request->routing;
        $credentialbank->account = $request->account;
        $credentialbank->corporateId = $request->corporate;
        $credentialbank->save();

        return response()->json($credentialbank);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $credentialbank = CredentialBank::where('corporateId', $id)->get();
        return response()->json($credentialbank);
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
            'bank' => 'required',
            'link' => 'required|url',
            'type' => 'required',
            'user' => 'required',
            'password' => 'required',
            'routing' => 'required',
            'account' => 'required',
            'corporate' => 'required'
        ]);

        $credentialbank = CredentialBank::find($id);
        $credentialbank->bankId = $request->bank;
        $credentialbank->link = $request->link;
        $credentialbank->typeId = $request->type;
        $credentialbank->user = $request->user;
        $credentialbank->password = $request->password;
        $credentialbank->routing = $request->routing;
        $credentialbank->account = $request->account;
        $credentialbank->corporateId = $request->corporate;
        $credentialbank->save();

        return response()->json($credentialbank);
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
