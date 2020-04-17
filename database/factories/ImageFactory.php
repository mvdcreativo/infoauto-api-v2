<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        //
        'url'=> asset('storage/images/publications/'.rand(1,509).".jpeg"),
        'position' => rand(1,10),
    ];
});
