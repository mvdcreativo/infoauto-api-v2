<?php

namespace App\Http\Controllers\Api\Ubications;

use App\Ubications\Neighborhood;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NeighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Neighborhood::with('city')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ubications\Neighborhood  $neighborhood
     * @return \Illuminate\Http\Response
     */
    public function show(Neighborhood $neighborhood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ubications\Neighborhood  $neighborhood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Neighborhood $neighborhood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ubications\Neighborhood  $neighborhood
     * @return \Illuminate\Http\Response
     */
    public function destroy(Neighborhood $neighborhood)
    {
        //
    }
}
