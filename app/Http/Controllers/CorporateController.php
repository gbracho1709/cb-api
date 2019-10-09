<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Corporate;

class CorporateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corporate = Corporate::All();
        return response()->json($corporate);
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
            'phone' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'clasification' => 'required',
            'started' => 'required|date',
            'incorporate' => 'required|date',
            'fiscalyear' => 'required|date_format:Y',
            'certification' => 'required',
            'federal' => 'required'
        ]);

        $corporate = new Corporate;
        $corporate->uuid = Str::uuid();
        $corporate->name = $request->name;
        $corporate->address = $request->address;
        $corporate->website = $request->website;
        $corporate->phone = $request->phone;
        $corporate->fax = $request->fax;
        $corporate->cityId = $request->city;
        $corporate->zip = $request->zip;
        $corporate->clasificationId = $request->clasification;
        $corporate->started = $request->started;
        $corporate->incorporate = $request->incorporate;
        $corporate->fiscalYear = $request->fiscalyear;
        $corporate->certification = $request->certification;
        $corporate->federal = $request->federal;
        $corporate->save();

        return response()->json($corporate);
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
            'phone' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'clasification' => 'required',
            'started' => 'required|date',
            'incorporate' => 'required|date',
            'fiscalyear' => 'required|date_format:Y',
            'certification' => 'required',
            'federal' => 'required'
        ]);

        $corporate = Corporate::find($id);
        $corporate->name = $request->name;
        $corporate->address = $request->address;
        $corporate->website = $request->website;
        $corporate->phone = $request->phone;
        $corporate->fax = $request->fax;
        $corporate->cityId = $request->city;
        $corporate->zip = $request->zip;
        $corporate->clasificationId = $request->clasification;
        $corporate->started = $request->started;
        $corporate->incorporate = $request->incorporate;
        $corporate->fiscalYear = $request->fiscalyear;
        $corporate->certification = $request->certification;
        $corporate->federal = $request->federal;
        $corporate->save();

        return response()->json($corporate);
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
