<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Office;

class OfficeController extends Controller
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
    public function index()
    {
        $office = Office::All();
        return response()->json($office);
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
            'dba' => 'required',
            'phone' => 'required',
            'fax' => 'required',
            'ein' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required'
        ]);

        $office = new Office;
        $office->name = $request->name;
        $office->dba = $request->dba;
        $office->phone = $request->phone;
        $office->fax = $request->fax;
        $office->ein = $request->ein;
        $office->address = $request->address;
        $office->cityId = $request->city;
        $office->zip = $request->zip;
        $office->save();

        return response()->json($office);
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
            'name' => 'required',
            'dba' => 'required',
            'phone' => 'required',
            'fax' => 'required',
            'ein' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required'
        ]);

        $office = Office::find($id);
        $office->name = $request->name;
        $office->dba = $request->dba;
        $office->phone = $request->phone;
        $office->fax = $request->fax;
        $office->ein = $request->ein;
        $office->address = $request->address;
        $office->cityId = $request->city;
        $office->zip = $request->zip;
        $office->save();

        return response()->json($office);
    }
}
