<?php

namespace App\Http\Controllers\Api;

use App\Extra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Extra::all();

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
        $validateExtra = Extra::where('slug', $slug)->get();

        if(count($validateExtra)>=1){
            return response()->json(["message" => "Ctca. Extra ".$name." ya existe!!!"], 400);
        }else{

            $extra = new Extra;
            $extra->name = $name;
            $extra->slug = $slug;
            $extra->save();

            return response()->json($extra, 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Extra::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $name = $request->name;
        $slug = str_slug($name);
        $validateExtra = Extra::where('slug', $slug)->get();

        if(count($validateExtra)>=1){
            return response()->json(["message" => "Ctca. Extra ".$name." ya existe!!!"], 400);
        }else{

            $extra = Extra::find($id);
            if($request->name){
                $extra->name = $name;
                $extra->slug = $slug;
                $extra->save();
            }

            return response()->json($extra, 200);
        }    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $extra = Extra::find($id);
        $extra->delete();

        return response()->json($extra, 200);
    }
}
