<?php

namespace App\Http\Controllers\Homework;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('site.product_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ProductCreateRequest $request)  {

        $data = $request->only('name',
            'description',
            'package',
            'category_id',
            'price',
            'image');

        DB::transaction(function () use ($data) {

            $product = Product::create($data);
            $product->product_images()->create(['image' => 'public/img/' . $data['image']]);

        });


        return redirect(
            route('homework.products_show')
        )->with('success', 'Новый товар успешно создан.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function products_show(Category $category = null)
    {
       if ($category) {
           $query = Product::whereHas('category', function ($query) use ($category) {
             $query->where('id', $category->id);
           });
        }
        else{
            $query = Product::query();
        }
        $products = $query->orderBy('category_id')->paginate(20);

        return view('site.product_list', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function product_show(Product $product)
    {
        return view('site.product_one', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('site.product_edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function product_update(ProductCreateRequest $request, Product $product)
    {
        $id = $product->id;
        $data = $request->only('name',
                                     'description',
                                     'package',
                                     'category_id',
                                     'price',
                                     'image');


        DB::transaction(function () use ($data, $product) {

            $product->update($data);
            $product->product_images()->update(['image' => 'public/img/' . $data['image']]);

        });

        /**
         * Не решил как правильно - обновлять фотку старую или добавлять новую
         */
//       $product->product_images()->create(['image' => 'public/img/'.$data['image']]);

        return redirect(
            route('homework.products_show')
            )->with('info', 'Данный товар успешно обновлен.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy(Product $product)
    /**
     * @param Request $request
     * @return bool
     */
    public function destroy(Request $request)
    {
        $id = $request->get('delete_id');
        $deleted = Product::find($id)->delete();
        if ($deleted){
            return true;
        }
    }
}