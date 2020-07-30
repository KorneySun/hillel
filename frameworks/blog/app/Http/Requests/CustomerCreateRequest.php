<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Http\Rules\UpperCaseFirstLetterRule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerCreateRequest extends HomeworkCreateRequest
{
   public function rules()
    {
        return [
            'customer_name' => [
                'bail',
                'required',
                'min:2',
                'max:10',
                new UpperCaseFirstLetterRule,

            ],
            'surname' => [
                'bail',
                'required',
                'min:3',
                'max:15',
                new UpperCaseFirstLetterRule,

            ],
            'email' => [
                'required',
                'email',
            ],
            'phone' => [
                'required',
                'numeric',
                'digits_between:10,13'

            ]
        ];
    }
}
