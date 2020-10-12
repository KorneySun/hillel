<?php

namespace Tests\Unit\Controllers;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\QueryException;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;


class ProductControllerTest extends TestCase
{


    /**
     * @var Generator|Factory
     */
//    private $faker;

    use WithFaker;

    public function testCreate()
    {
        $attributes = [

            'name' => $this->faker->text(rand(10, 30)),
            'description' => $this->faker->text(rand(10, 200)),
            'package' => 'шт',
            'price' => $this->faker->randomFloat(0,1, 10000),
            'category_id' => $this->faker->numberBetween(1,2)

        ];


        $product = Product::create($attributes);

        $this->assertNotEmpty($product->name);
        $this->assertNotEmpty($product->description);
        $this->assertNotEmpty($product->package);
        $this->assertNotEmpty($product->price);
        $this->assertNotEmpty($product->category_id);

        /**
         * Категории могут принимать значения 1 или 2
         */
        $this->assertGreaterThanOrEqual(Category::find($product->category_id)->id, 2);

    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = Factory::create();
    }

}