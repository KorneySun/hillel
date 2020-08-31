<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Http\Rules\TimeOrderProductRule;
use App\Http\Rules\CheckCurrentDateRule;
use App\Http\Rules\UpperCaseFirstLetterRule;
use Illuminate\Foundation\Http\FormRequest;

class ServiceCreateRequest extends HomeworkCreateRequest
{
    public function rules()
    {
        return [
            'order_number' => [
                'bail',
                'required',
                'min:1',
                'max:1000',
                'integer'

            ],
            'order_price' => [
                'required',
                'numeric',
            ],
            'order_date' => [
                'required',
                'date',
                new  TimeOrderProductRule,
                new  CheckCurrentDateRule
            ]
        ];
    }
}
