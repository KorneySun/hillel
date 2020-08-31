<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Http\Rules\UpperCaseFirstLetterRule;
use App\Http\Rules\CheckCategoriesListRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends HomeworkCreateRequest
{
    public function rules()
    {
        return [
            'name' => [
                'bail',
                'required',
                'min:1',
                'max:20',
                new UpperCaseFirstLetterRule,
            ],
            'description' => [
                'required',
                'min:1',
                'max:20',
                new UpperCaseFirstLetterRule,
            ],
            'package' => [
                'required',
                'min:1',
                'max:10',
            ],
            'category_id' => [
                'required',
                'integer',
                new CheckCategoriesListRule,
            ],
            'price' => [
                'required',
                'numeric',
                'min:1',
                'max:10000'
            ],
        ];
    }
}
