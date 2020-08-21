<?php

namespace App\Http\Controllers\Homework;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('site.product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        /// пример валидации в контроллере
//        $data = $request->validate([
//            'title' => 'required|min:3|max:10',
//            'email' => [
//                'required',
//                'email',
//            ],
//        ])->;

//        $request->get('title'); // получения поля с запроса через геттер - самый правильный
//        $request->title; // получения поля с запроса в ооп стиле
//        $request['title']; // получения поля с запроса как с ассоциативного массива

        $request->all(); // все поля в запросе
//        $request->only('title', 'email'); // только определенные поля

        return redirect(
            route('homework.index')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function products_show($category_id)
    {



       if ($category_id == 1||$category_id == 2) {

           $query = Product::where('category_id', '=', $category_id);
           $products = $query->orderBy('category_id')->paginate(20);
        }
        else{
            $query = Product::where('id', '<>', 0);
        }
        $products = $query->orderBy('category_id')->paginate(20);


//       dd($products);

        return view('site.product_list', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function product_show($id)
    {
        $product = Product::with(['product_images'])
                   ->where('id', $id)->first();
        return view('site.product_one', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCreateRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}