<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'total_price_usd' => $faker->numberBetween($min = 20, $max = 100),
        'total_price_euro' => $faker->numberBetween($min = 20, $max = 100),
        'user_id' => null,
        'delivery_address' => $faker->address,
        'contacts' => $faker->phoneNumber,
        'comment' => $faker->realText($maxNbChars = 20, $indexSize = 2)
    ];
});
