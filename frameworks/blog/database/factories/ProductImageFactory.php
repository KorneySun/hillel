<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductImage;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(ProductImage::class, function (Faker $faker) {

    $temp_image = $faker->image($dir = "public/img", $width = 100, $height = 60, $category = null, $fullPath = true, $randomize = true, $word = null);
    $image = str_replace('\\', '/', $temp_image);

    return [
        'image' => $image,
        'product_id' => function() {
            return Product::inRandomOrder()->get()->first()->id;
        }
    ];
});