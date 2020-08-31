<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Database\Eloquent\Model;

$factory->define(Product::class, function (Faker $faker) {

    $faker->addProvider(new App\Faker\ProductProvider($faker));
    $temp = $faker->productName();

    return [
        'name' => $temp['name'],
        'description' => $faker->colorName,
        'package' => 'шт',
        'price' => $faker->randomFloat(0,1, 10000),
        'category_id' => $temp['category']
    ];
});
