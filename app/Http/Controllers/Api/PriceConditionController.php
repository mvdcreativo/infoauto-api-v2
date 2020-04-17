<?php

namespace App\Http\Controllers\Api;

use App\PriceCondition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PriceConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PriceCondition::all();
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
     * @param  \App\PriceCondition  $priceCondition
     * @return \Illuminate\Http\Response
     */
    public function show(PriceCondition $priceCondition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PriceCondition  $priceCondition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PriceCondition $priceCondition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PriceCondition  $priceCondition
     * @return \Illuminate\Http\Response
     */
    public function destroy(PriceCondition $priceCondition)
    {
        //
    }
}
