<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\License::class, function (Faker $faker) {
    return [
        'id' => $faker->randomNumber(),
        'name' => $faker->word()
    ];
});
