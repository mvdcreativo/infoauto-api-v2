<?php

namespace App\Http\Controllers\Api;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchProductController extends Controller
{
    public function search(Request $request, Product $product)
    {
        $cateoria = $request->category;
        $category = $request->category_id;
        $marca = $request->brand;
        $modelo = $request->model;
        $price_min = $request->pricemin;
        $price_max = $request->pricemax;
        $year_min = $request->yearmin;
        $year_max = $request->yearmax;
        $attribute = $request->attribute;
        $condition = $request->condition;
        $user_id = $request->user_id;
        $user = $request->user;
        $tariff_id = $request->tariff_id;
        $limit_page = $request->limit_page;
        $searcher = $request->searcher;

        if(!$limit_page){
            $limit_page = 20;
        }
        $result= Product::with('brand', 'user', 'price_condition','vehicle_category','vehicle_model', 'vehicle_sub_model', 'attributes', 'extras', 'city','neighborhood', 'currency','condition', 'images' )
            ->orderBy('tariff_id', 'DESC')
            ->orderBy('visit', 'DESC')
            // ->where('status_id', 1)
            ->categoria($cateoria)
            ->category($category)
            ->marca($marca)
            ->modelo($modelo)
            ->price_min($price_min)
            ->price_max($price_max)
            ->year_min($year_min)
            ->year_max($year_max)
            ->attribute($attribute)
            ->condition($condition)
            ->user_id($user_id)
            ->user($user)
            ->tariff_id($tariff_id)
            ->searcher($searcher)
            ->paginate($limit_page);


        // return $request->all();
        return response()->json($result, 200);
    }

    public function findByUser($id){

        $product = Product::with('user', 'brand','status', 'vehicle_model', 'vehicle_sub_model', 'user', 'price_condition', 'currency', 'tariff', 'images')->where('user_id', $id)->get();

        return response()->json($product, 200);
    }




    public function searchPlantilla(Request $request, Product $product)
    {
        // return $request->all();
        $category_id = $request->category_id;
        $brand_id = $request->brand_id;
        $model_id = $request->model_id;
        $sub_model_id = $request->sub_model_id;
        $year = $request->year;
        $cilindrada = $request->cilindrada;

 

        $result= Product::with('attributes','status' )
            
            ->where('status_id', 6)
            ->brand($brand_id)
            ->category($category_id)
            ->model($model_id)
            ->subModel($sub_model_id)
            ->year($year)
            ->cilindrada($cilindrada)
            ->first();

        // return $request->all();
        return response()->json($result, 200);
    }
}
