<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
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
     * @OA\Get(
     *     path="/example",
     *     summary="lorem ipsum",
     *     tags={"initial"},
     *     description="lorem ipsum",
     *     operationId="unique",
     *     security={
     *       {"api_key": {}}
     *     },
     *   @OA\Response(
     *       response=200,
     *       description="successful operation",
     *   ),
     *   @OA\Response(
     *       response="400",
     *       description="Invalid data",
     *   ),
     *   deprecated=false
     * )
     */
}
