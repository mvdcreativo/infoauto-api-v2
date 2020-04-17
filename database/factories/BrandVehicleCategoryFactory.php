<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vehicles\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    $name = $faker->company();
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'image_id' => rand(1,50)
    ];
});
