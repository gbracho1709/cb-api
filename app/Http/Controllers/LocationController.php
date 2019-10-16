<?php

namespace App\Http\Controllers;

use App\City;

class LocationController extends Controller
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
    public function city()
    {
        $city = City::with('state')->get();
        return response()->json($city);
    }
}
