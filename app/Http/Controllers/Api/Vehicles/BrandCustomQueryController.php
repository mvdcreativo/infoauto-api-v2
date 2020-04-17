<?php

namespace App\Http\Controllers\Api\Vehicles;
use App\Vehicles\Brand;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandCustomQueryController extends Controller
{
    public function limit_query($limit){

        if (!$limit) {
           $limit = null;
        }
        $brand = Brand::with('vehicle_models')->orderBy('visit', 'DESC')->limit($limit)->get();
        
        return response()->json($brand, 200);
    }
}
