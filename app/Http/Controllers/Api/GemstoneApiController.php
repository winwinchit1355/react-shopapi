<?php

namespace App\Http\Controllers\Api;

use App\Models\Gemstone;
use Illuminate\Http\Request;
use App\Responses\ResponseFormat;
use App\Http\Controllers\Controller;

class GemstoneApiController extends Controller
{
    use ResponseFormat;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gemstones=Gemstone::all();
        return  $this->apiSuccessResponse($gemstones,'Successfully',200);
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
