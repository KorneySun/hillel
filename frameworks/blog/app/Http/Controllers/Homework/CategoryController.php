<?php

namespace App\Http\Controllers\Homework;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categories_show(Category $category)
    {
        $query = Category::query();

        $category = $query->orderBy('id')->paginate(20);

        return view('site.categories_list', compact('category'));
    }

}