<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\License;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $license = License::All();
        return response()->json($license);
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
            'serial' => 'required',
            'license' => 'required',
            'corporate' => 'required',
            'issue' => 'required|date',
            'due' => 'required|date',
            'observation' => 'required'
        ]);

        $license = new License;
        $license->serial = $request->serial;
        $license->licenseTypeId = $request->license;
        $license->uuid = $request->corporate;
        $license->issueDate = $request->issue;
        $license->dueDate = $request->due;
        $license->observation = $request->observation;
        $license->save();

        return response()->json($license);
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
            'serial' => 'required',
            'license' => 'required',
            'corporate' => 'required',
            'issue' => 'required|date',
            'due' => 'required|date',
            'observation' => 'required'
        ]);

        $license = License::find($id);
        $license->serial = $request->serial;
        $license->licenseTypeId = $request->license;
        $license->uuid = $request->corporate;
        $license->issueDate = $request->issue;
        $license->dueDate = $request->due;
        $license->observation = $request->observation;
        $license->save();

        return response()->json($license);
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
