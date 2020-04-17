<?php

namespace App\Http\Controllers\Api\Vehicles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;


use App\Vehicles\VehicleCategory;

class VehicleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return VehicleCategory::all();

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
            'name' => ['required']
        ]);

        $name = $request->name;
        $slug = str_slug($name);
        $validateCategory = VehicleCategory::where('slug', $slug)->get();


        if(count($validateCategory)>=1){
            return response()->json(["message" => "El Tipo ".$name." ya existe!!!"], 400);
        }else{

            $category = new VehicleCategory;
            $category->name = $name;
            $category->slug = $slug;
            $category->save();

            return response()->json($category, 200);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return VehicleCategory::with('brands')->find($id);
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
            'name' => ['required']
        ]);

        $name = $request->name;
        $slug = str_slug($name);
        $validateCategory = VehicleCategory::where('slug', $slug)->where('id', '!=', $id)->get();


        if(count($validateCategory)>=1){
            return response()->json(["message" => "El Tipo ".$name." ya existe!!!"], 400);
        }else{

            $category = VehicleCategory::find($id);
            $category->name = $name;
            $category->slug = $slug;
            $category->save();

            return response()->json($category, 200);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = VehicleCategory::find($id);
        $category->delete();

        return response()->json($category, 200);
    }
}
