<?php

namespace App\Http\Controllers\Api;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuiaPrecioController extends Controller
{
    
    public function precios_chart(Request $request, Product $product)
    {
        $cateoria = $request->category;
        $marca = $request->brand;
        $modelo = $request->model;
        $year = $request->year;
        $kms  = $request->kms;

        $result= Product::
            orderBy('price' , 'ASC')
            ->year($year)
            ->categoria($cateoria)
            ->marca($marca)
            ->modelo($modelo)
            ->kms($kms)
            ->get();
        
        return $result;

    }
    

}
