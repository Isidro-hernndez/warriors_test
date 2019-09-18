<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Warrior;
use Faker\Generator as Faker;

$factory->define(Warrior::class, function (Faker $faker) {
    return [
        'name' => $faker->text($maxNbChars = 8),
        'speed' => $faker->numberBetween($min = 1, $max = 5),
        'strength' => $faker->numberBetween($min = 1, $max = 5),
        'skills' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
