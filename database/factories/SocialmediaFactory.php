<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Socialmedia;
use Faker\Generator as Faker;

$factory->define(App\Socialmedia::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'image' => $faker->image(),
        'address' => $faker->address
    ];
});
