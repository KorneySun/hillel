<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 28.09.2020
 * Time: 18:07
 */

namespace Tests\Feature\Forms;

use App\Models\Product;
use Illuminate\Support\Str;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function testPage()
    {
        $response = $this->get(route('index'));

        $response->assertStatus(200);
    }

    public function testForm()
    {
        $response = $this->get(route('homework.product_create'));

//        dump($response);

        $response
            ->assertStatus(200);
//            ->assertSee('Product_create');
    }

    public function testFormBodyEmptyError()
    {
        $response = $this->post(route('homework.product_store'), [
            'name' => '',
            'description'  => '',
            'package'  => '',
            'category_id'  => '',
            'price'  => ''
        ]);

        $response
            ->assertStatus(302)
            ->assertSessionHasErrors(['name', 'description', 'package', 'category_id', 'price']);
    }

    public function testFormWithInvalidPriceError()
    {
        $response = $this->post(route('homework.product_store'), [
            'name' => Str::random(15),
            'price' => Str::random(10),
        ]);

        $response
            ->assertStatus(302)
            ->assertSessionHasErrors(['price']);
    }

    public function testFormSuccess()
    {
        $product = factory(Product::class)->create();

        $response = $this->post(route('homework.product_store'), [
            'name' => $product->name,
        ]);

        $response
            ->assertStatus(302)
            ->assertRedirect(route('index'));

    }
}