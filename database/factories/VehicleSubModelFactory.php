<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vehicles\VehicleSubModel;
use Faker\Generator as Faker;

$factory->define(VehicleSubModel::class, function (Faker $faker) {
    $name = $faker->company();
    return [
        'name' => $name,
        'slug' => str_slug($name),
    ];
});
