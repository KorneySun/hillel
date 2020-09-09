<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Database\Eloquent\Model;

$factory->define(Category::class, function () {

    $name = ['Мебель', 'Инструменты'];
    $name_key = array_rand($name, 1);

    return [
        'name' => $name[$name_key]
    ];
});
