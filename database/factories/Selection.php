<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Selection::class, function (Faker $faker) {
    return [
        'id' => uniqid(),
        'version' => $faker->randomDigit
    ];
});
