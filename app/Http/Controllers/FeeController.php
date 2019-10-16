<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fee;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'plan' => 'required',
            'scheme' => 'required',
            'start' => 'required',
            'fee' => 'required',
            'corporate' => 'required'
        ]);

        $fee = new Fee;
        $fee->planId = $request->plan;
        $fee->schemeId = $request->scheme;
        $fee->startOn = $request->start;
        $fee->fee = $request->fee;
        $fee->reference = $request->corporate;
        $fee->save();

        return response()->json($fee);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fee = Fee::where('reference', $id)->first();
        return response()->json($fee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
            'plan' => 'required',
            'scheme' => 'required',
            'start' => 'required',
            'fee' => 'required',
            'corporate' => 'required'
        ]);

        $fee = Fee::find($id);
        $fee->planId = $request->plan;
        $fee->schemeId = $request->scheme;
        $fee->startOn = $request->start;
        $fee->fee = $request->fee;
        $fee->reference = $request->corporate;
        $fee->save();

        return response()->json($fee);
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
