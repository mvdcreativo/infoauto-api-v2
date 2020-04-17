<?php

namespace App\Http\Controllers\Api\Vehicles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vehicles\VehicleModel;
use App\Product;
use Illuminate\Support\Facades\Storage;



class VehicleModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VehicleModel::with('brand')->orderBy('visit', 'DESC')->paginate(4);

    }


    public function getAll()
    {
        return VehicleModel::with('brand')->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($id)){
            exit;
        }
        $this->validate($request, [
            'name' => ['required'],
            'brand_id'=> ['required']
        ]);

        $name = $request->name;
        $slug = str_slug($name);
        $brand_id = $request->brand_id;
        $validateVehicleModel = VehicleModel::where('slug', $slug)->where('brand_id', $brand_id)->get();
        if(count($validateVehicleModel)>=1){
            return response()->json(["message" => "Modelo ".$name." ya existe!!!"], 400);
        }else{


            $model = new VehicleModel;
            $model->name = $name;
            $model->slug = $slug;
            $model->brand_id = $brand_id;
            $model->save();


            return response()->json($model, 200);
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
        return VehicleModel::with('brand', 'veicle_sub_models')->find($id);

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
            'name' => ['required'],
            'brand_id'=> ['required']
        ]);

        $name = $request->name;
        $slug = str_slug($name);
        $brand_id = $request->brand_id;
        $validateVehicleModel = VehicleModel::where('slug', $slug)
                ->where('brand_id', $brand_id)
                ->where('id', '!=', $id)
                ->get();
        if(count($validateVehicleModel)>=1){
            return response()->json(["message" => "Modelo ".$name." ya existe!!!"], 400);
        }else{


            $model = VehicleModel::find($id);
            $model->name = $name;
            $model->slug = $slug;
            $model->brand_id = $brand_id;
            $model->save();

            return response()->json($model, 200);
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
        $brand = VehicleModel::find($id);
        $brand->delete();

        return response()->json($brand, 200);
    }
}
