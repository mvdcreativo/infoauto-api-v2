<?php

namespace App\Http\Controllers\Api\Vehicles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vehicles\Brand;
use Illuminate\Support\Facades\Storage;





class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return Brand::with('vehicle_models')->orderBy('visit', 'DESC')->get();
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
        $validateBrand = Brand::where('slug', $slug)->get();

        if(count($validateBrand)>=1){
            return response()->json(["message" => "Marca ".$name." ya existe!!!"], 400);
        }else{


            $brand = new Brand;
            $brand->name = $name;
            $brand->slug = $slug;
            $brand->save();

            if($request->hasFile('image')){
                $img = $request->file('image');

                $path = Storage::disk('public')->put('images/logos-marcas',  $img);
                // $product->fill(['file' => asset($path)])->save();

                $brand->fill(['image_url' => $path])->save();
            }
            // $brand->save();

            return response()->json($brand, 200);
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

        return Brand::with('vehicle_models')->find($id);
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
        $validateBrand = Brand::where('slug', $slug)->where('id', '!=', $id)->get();

        if(count($validateBrand)>=1){
            return response()->json(["message" => "Marca ".$name." ya existe!!!"], 400);
        }else{


            $brand = Brand::find($id);
            $brand->name = $name;
            $brand->slug = $slug;
            $brand->save();

            if($request->hasFile('image')){
                $img = $request->file('image');

                $path = Storage::disk('public')->put('images/logos-marcas',  $img);
                // $product->fill(['file' => asset($path)])->save();

                $brand->fill(['image_url' => $path])->save();
                $brand->save();
            }

            return response()->json($brand, 200);
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
        $brand = Brand::find($id);
        $brand->delete();

        return response()->json($brand, 200);
    }
}
