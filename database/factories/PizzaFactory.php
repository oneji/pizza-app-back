<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pizza;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Pizza::class, function (Faker $faker) {
    return [
        'name' => 'Pizza',
        'image' => null,
        'pizza_category_id' => 1,
        'description' => $faker->realText($maxNbChars = 50, $indexSize = 2),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
