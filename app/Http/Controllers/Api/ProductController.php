<?php

namespace App\Http\Controllers\Api;

use App\Product;
use App\Image;
use App\Vehicles\VehicleModel;
use App\Vehicles\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::with('condition', 'user', 'brand', 'vehicle_category','vehicle_model', 'vehicle_sub_model', 'city','neighborhood', 'user', 'price_condition', 'tariff', 'images')->get();

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
            'user_id' => 'required',
            'vehicle_category_id' => 'required',
            'brand_id' => 'required',
            'vehicle_model_id' => 'required',
            'year' => 'required',
   

        ]);

        $product = new Product;
        $product->user_id = $request->user_id;
        $product->vehicle_category_id = $request->vehicle_category_id;
        $product->brand_id = $request->brand_id;
        $product->vehicle_model_id = $request->vehicle_model_id;
        $product->vehicle_sub_model_id = $request->vehicle_sub_model_id;
        $product->year = $request->year;
        $product->km = $request->km;
        $product->price = $request->price;
        $product->condition_id = $request->condition_id;
        $product->name_concat = $request->name_concat;
        $product->currency_id = $request->currency_id;
        $product->city_id = $request->city_id;
        $product->neighborhood_id = $request->neighborhood_id;
        $product->price_condition_id = $request->price_condition_id;
        $product->tariff_id = $request->tariff_id;
        $product->status_id = $request->status_id;
        $product->cilindrada = $request->cilindrada;

        $product->save();

        $brand = Brand::find($request->brand_id);
        $brand->vehicle_categories()->sync($request->vehicle_category_id);

        return response()->json($product, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('user', 'brand', 'vehicle_category','vehicle_model', 'vehicle_sub_model', 'attributes', 'extras', 'city', 'currency','condition', 'images' )->find($id);

        if($product){
            $model_id = $product->vehicle_model_id;
            $model = VehicleModel::find($model_id);
            $model->visit++;
            $model->save();

            $brand_id = $product->brand_id;
            $brand = Brand::find($brand_id);
            $brand->visit++;
            $brand->save();

            $product->visit++;
            $product->save();
        }

        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //Front step1
        $product = Product::with('attributes', 'brand','vehicle_model', 'vehicle_sub_model','extras', 'images')->find($id);
        if ($request->vehicle_category_id) $product->vehicle_category_id = $request->vehicle_category_id;
        if ($request->brand_id) $product->brand_id = $request->brand_id;
        if ($request->vehicle_model_id) $product->vehicle_model_id = $request->vehicle_model_id;
        if ($request->vehicle_sub_model_id) $product->vehicle_sub_model_id = $request->vehicle_sub_model_id;
        if ($request->year) $product->year = $request->year;
        if ($request->km) $product->km = $request->km;
        if ($request->name_concat) $product->name_concat = $request->name_concat;
        if ($request->price) $product->price = $request->price;
        if ($request->currency_id) $product->currency_id = $request->currency_id;
        if ($request->city_id) $product->city_id = $request->city_id;
        if ($request->neighborhood_id) $product->neighborhood_id = $request->neighborhood_id;
        if ($request->price_condition_id) $product->price_condition_id = $request->price_condition_id;
        if ($request->tariff_id) $product->tariff_id = $request->tariff_id;
        if ($request->status_id) $product->status_id = $request->status_id;
        if ($request->cilindrada) $product->cilindrada = $request->cilindrada;


        // $product->url = $product->id."/".$product->brand->name."/".$product->vehicle_model->name."/".$product->vehicle_sub_model->name;

        //FrontStep2
        if ($request->get('attributes')) $product->attributes()->sync($request->get('attributes'));
        

        //FrontStep3
        if ($request->get('extras')) $product->extras()->sync($request->get('extras'));
        if ($request->description) $product->description = $request->description;

        
        // Images
        $this->validate($request, [

            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048000'

        ]);
        //IMAGE
        // return $request->file('images');
        if($request->hasFile('images')){
            foreach($request->file('images') as $image)
            {

                // echo $image->path();

                $path = Storage::disk('public')->put('images/publications',  $image);
                // $product->fill(['file' => asset($path)])->save();
                $image = new Image;
                $image->fill(['url' => asset('storage/'.$path)])->save();
                $image->products()->sync($id);
                $image->save();
                // $path = $image->getClientOriginalName();
                // $image->move(public_path().'/images/publications/', $name);
                // $images_name[] = $name;

            }
            $product = Product::with('attributes', 'extras', 'images')->find($id);
            return response()->json($product, 200);
         }


        $product->save();
        if($product->vehicle_category_id && $product->brand_id && $product->vehicle_model_id && $product->vehicle_sub_model_id && $product->year && $product->cilindrada){
            $product->status_id = 6;
            $product->save();
            if ($product->price && $product->currency_id && $product->tariff_id && $product->images) {
                $product->status_id = 1;
                $product->save();
            }
        }else{
            $product->status_id = 5;
            $product->save();
        }

        return response()->json($product, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json($product, 200);    
    }






    public function get_plantillas()
    {
        $plantilla = Product::with('status')->where('status_id','6')->orWhere('status_id','7')->get();
        return response()->json($plantilla, 200);
    }
}
