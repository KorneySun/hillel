<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Http\Rules\UpperCaseFirstLetterRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends HomeworkCreateRequest
{
    public function rules()
    {
        return [
            'product_name' => [
                'bail',
                'required',
                'min:1',
                'max:20',
                new UpperCaseFirstLetterRule,
            ],
            'price' => [
                'required',
                'numeric',
            ],
            'quality' => [
                'required',
                'integer',
            ],

        ];
    }
}
