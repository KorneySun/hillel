<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use App\Models\User;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Order::class, function (Faker $faker) {

    $order_number = $faker->unique()->numberBetween($min = 1, $max = 100);

    return [
        'order_number' => $order_number,
        'order_date' =>$date = Carbon::now()->subDays(100 - $order_number),
        'user_id' => function() {
            return User::inRandomOrder()->get()->first()->id;
        },
        'order_sum' => $faker->randomFloat(0,1, 10000)
    ];
});





