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

    public function city()
    {
        $city = City::with('state')->get();
        return response()->json($city);
    }
}
