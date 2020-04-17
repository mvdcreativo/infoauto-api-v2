<?php

namespace App\Http\Controllers\Api;

use App\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Attribute::with('attribute', 'attributes')->get();
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
        $validateAttribute = Attribute::where('slug', $slug)->get();

        if(count($validateAttribute)>=1){
            return response()->json(["message" => "Attributo ".$name." ya existe!!!"], 400);
        }else{

            $attribute = new Attribute;
            $attribute->name = $name;
            $attribute->slug = $slug;
            $attribute->attribute_id = $request->attribute_id;
            $attribute->save();

            return response()->json($attribute, 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Attribute::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $name = $request->name;
        $slug = str_slug($name);

        $validateAttribute = Attribute::where('slug', $slug)->where('id', '!=', $id)->get();

        // return $validateAttribute;

        if(count($validateAttribute)>=1){
            return response()->json(["message" => "Attributo ".$name." ya existe!!!"], 400);
        }else{

            $attribute = Attribute::find($id);
            $attribute->name = $name;
            $attribute->slug = $slug;
            $attribute->attribute_id = $request->attribute_id;
            $attribute->save();

            return response()->json($attribute, 200);
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = Attribute::find($id);
        $attribute->delete();

        return response()->json($attribute, 200);
    }
}
