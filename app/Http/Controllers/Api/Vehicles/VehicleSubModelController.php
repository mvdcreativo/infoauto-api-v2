<?php

namespace App\Http\Controllers\Api\Vehicles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vehicles\VehicleSubModel;

class VehicleSubModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return VehicleSubModel::with('vehicle_model')->get();
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
            'name' => ['required'],
            'model_id'=> ['required']
        ]);

        $name = $request->name;
        $slug = str_slug($name);
        $vehicle_model_id = $request->model_id;
        $validateVehicleSubModel = VehicleSubModel::where('slug', $slug)->where('vehicle_model_id', $vehicle_model_id)->get();

        if(count($validateVehicleSubModel)>=1){
            return response()->json(["message" => "Sub-Modelo ".$name." ya existe!!!"], 400);
        }else{


            $sub_model = new VehicleSubModel;
            $sub_model->name = $name;
            $sub_model->slug = $slug;
            $sub_model->vehicle_model_id = $vehicle_model_id;
            $sub_model->save();

            // if($request->hasFile('image')){
            //     $img = $request->file('image');

            //     $path = Storage::disk('public')->put('images/logos-marcas',  $img);
            //     // $product->fill(['file' => asset($path)])->save();

            //     $sub_model->fill(['image_url' => $path])->save();
            //     $sub_model->save();
            // }

            return response()->json($sub_model, 200);
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
        //
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
            'model_id'=> ['required']
        ]);

        $name = $request->name;
        $slug = str_slug($name);
        $vehicle_model_id = $request->model_id;
        $validateVehicleSubModel = VehicleSubModel::where('slug', $slug)
                ->where('vehicle_model_id', $vehicle_model_id)
                ->where('id', '!=', $id)
                ->get();

        if(count($validateVehicleSubModel) >= 1){
            return response()->json(["message" => "Sub-Modelo ".$name." ya existe!!!"], 400);
        }else{


            $sub_model = VehicleSubModel::find($id);
            $sub_model->name = $name;
            $sub_model->slug = $slug;
            $sub_model->vehicle_model_id = $vehicle_model_id;
            $sub_model->save();


            return response()->json($sub_model, 200);
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
        $sub_model = VehicleSubModel::find($id);
        $sub_model->delete();

        return response()->json($sub_model, 200);
    }
}
