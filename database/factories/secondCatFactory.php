<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Secondcat;
use Faker\Generator as Faker;

$factory->define(Secondcat::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'firstcat_id' => 1
    ];
});
