<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vehicles\VehicleCategory;
use Faker\Generator as Faker;

$factory->define(VehicleCategory::class, function (Faker $faker) {
    $name = $faker->company;
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'image_id' => rand(1,50)
    ];
});
