<?php

namespace App\Http\Controllers\Api;

use App\Models\Metal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Responses\ResponseFormat;

class MetalApiController extends Controller
{
    use ResponseFormat;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metals=Metal::all();
        return  $this->apiSuccessResponse($metals,'Successfully',200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
