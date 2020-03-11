<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Firstcat;
use Faker\Generator as Faker;

$factory->define(Firstcat::class, function (Faker $faker) {
    return [
        'title' => $faker->name('male')
    ];
});
