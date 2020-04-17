<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

use App\Vehicles\VehicleModel;
use App\Vehicles\Brand;


$factory->define(Product::class, function (Faker $faker) {
    $model_id=rand(1,1008);
    $model = VehicleModel::find($model_id);
    $model_name = $model->name;
    $brand_id = $model->brand_id;
    $brand= Brand::find($brand_id);

    $brand_name= $brand->name;
    $category_id= $brand->vehicle_categories[0]->id;

    

    return [
        'name_concat' => $brand_name." ".$model_name,
        'description'=> $faker->realText($maxNbChars =200),
        'price'=> $faker->randomFloat($nbMaxDecimals = 0, $min = 1000, $max = 250000),
        'state'=> $faker->randomElement(['ACT','PEN','INC','PAU',]),
        'status_id'=> 1,
        'km'=> rand(10000,500000),
        'year'=> rand(1990,2019),
        'visit'=> rand(0,50),
        'condition_id'=>rand(1,2),
        'vehicle_model_id'=> $model_id,
        'brand_id'=> $brand_id,
        'vehicle_category_id'=> $category_id,
        // 'vehicle_sub_model_id'=> rand(1,12),
        'city_id'=> 1,
        'neighborhood_id'=> rand(1,66),
        'user_id'=> rand(1,21),
        'price_condition_id'=> rand(1,4),
        'tariff_id' =>rand(1,4),
        'currency_id'=>2
    ];
});
