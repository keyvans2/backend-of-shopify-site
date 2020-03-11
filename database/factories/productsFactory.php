<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->address,
        'price' => 50000,
        'stock' => 20,
        'image' => '../images',
        'details' => $faker->text,
        'secondcat_id' => 2
    ];
});
