<?php

namespace App\Http\Controllers\Dev;

use App\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneraUrlProduct extends Controller
{

    public function urlProduct()
    {

        $products = Product::with('brand', 'vehicle_model')->get();

        foreach ($products as $product) {
            $product->url = $product->id."/".$product->brand->slug."/".$product->vehicle_model->slug."/".$product->year;
            $product->save();
        }
        
        
        return $products;
    }
}
