<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Thread::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(rand(5,10)),
        'body' => $faker->sentence(rand(7,12)),
    ];
});
