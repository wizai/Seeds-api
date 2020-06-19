<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Plant;
use Faker\Generator as Faker;

$factory->define(Plant::class, function (Faker $faker) {
    return [
        'title' => $faker->name(),
        'category' => $faker->sentence(),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'sowed' => $faker->dateTime(),
        'planted' => $faker->dateTime(),
        'seedling_frequency' => $faker->word(),
        'seedling_light' => $faker->word(),
        'planting_frequency' => $faker->word(),
        'planting_sprouting' => $faker->word(),
        'description' => $faker->text(),
        'localisation' => $faker->text(),
    ];
});
