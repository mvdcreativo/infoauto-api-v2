<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vehicles\VehicleModel;
use Faker\Generator as Faker;

$factory->define(VehicleModel::class, function (Faker $faker) {
    $name = $faker->company;
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'brand_id' => rand(1,15),
        'image_id' => rand(1,50)

    ];
});
