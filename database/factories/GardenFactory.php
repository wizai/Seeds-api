<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Garden;
use Faker\Generator as Faker;

$factory->define(Garden::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'user_id' => random_int(1, 3),
    ];
});
