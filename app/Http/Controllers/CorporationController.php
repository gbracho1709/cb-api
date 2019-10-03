<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Corporation;

class CorporationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corporation = Corporation::All();
        return response()->json($corporation);
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
            'address' => 'required',
            'website' => 'required|url',
            'fax' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'clasification' => 'required',
            'started' => 'required|date',
            'incorporate' => 'required|date',
            'fiscalyear' => 'required|date_format:Y',
            'certification' => 'required',
            'federal' => 'required'
        ]);

        $corporation = new Corporation;
        $corporation->name = $request->name;
        $corporation->address = $request->address;
        $corporation->website = $request->phone;
        $corporation->fax = $request->fax;
        $corporation->cityId = $request->city;
        $corporation->zip = $request->zip;
        $corporation->clasificationId = $request->clasification;
        $corporation->started = $request->started;
        $corporation->incorporate = $request->incorporate;
        $corporation->fiscalYear = $request->fiscalyear;
        $corporation->certification = $request->certification;
        $corporation->federal = $request->federal;
        $corporation->save();

        return response()->json($corporation);
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
            'address' => 'required',
            'website' => 'required|url',
            'fax' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'clasification' => 'required',
            'started' => 'required|date',
            'incorporate' => 'required|date',
            'fiscalyear' => 'required|date_format:Y',
            'certification' => 'required',
            'federal' => 'required'
        ]);

        $corporation = Corporation::find($id);
        $corporation->name = $request->name;
        $corporation->address = $request->address;
        $corporation->website = $request->phone;
        $corporation->fax = $request->fax;
        $corporation->cityId = $request->city;
        $corporation->zip = $request->zip;
        $corporation->clasificationId = $request->clasification;
        $corporation->started = $request->started;
        $corporation->incorporate = $request->incorporate;
        $corporation->fiscalYear = $request->fiscalyear;
        $corporation->certification = $request->certification;
        $corporation->federal = $request->federal;
        $corporation->save();

        return response()->json($corporation);
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
