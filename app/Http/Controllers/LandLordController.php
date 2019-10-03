<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Landlord;

class LandLordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $landlord = Landlord::All();
        return response()->json($landlord);
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
            'city' => 'required',
            'zip' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'note' => 'required',
            'corporation' => 'required'
        ]);

        $landlord = new Landlord;
        $landlord->name = $request->name;
        $landlord->address = $request->address;
        $landlord->cityId = $request->city;
        $landlord->zip = $request->zip;
        $landlord->phone = $request->phone;
        $landlord->mobile = $request->mobile;
        $landlord->email = $request->email;
        $landlord->note = $request->note;
        $landlord->corporationId = $request->corporation;
        $landlord->save();

        return response()->json($landlord);
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
            'city' => 'required',
            'zip' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'note' => 'required',
            'corporation' => 'required'
        ]);

        $landlord = Landlord::find($id);
        $landlord->name = $request->name;
        $landlord->address = $request->address;
        $landlord->cityId = $request->city;
        $landlord->zip = $request->zip;
        $landlord->phone = $request->phone;
        $landlord->mobile = $request->mobile;
        $landlord->email = $request->email;
        $landlord->note = $request->note;
        $landlord->corporationId = $request->corporation;
        $landlord->save();

        return response()->json($landlord);
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
