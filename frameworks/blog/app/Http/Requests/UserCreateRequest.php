<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Http\Rules\UpperCaseFirstLetterRule;
use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends HomeworkCreateRequest
{
   public function rules()
    {
        return [
            'name' => [
                'bail',
                'required',
                'min:2',
                'max:50',
                new UpperCaseFirstLetterRule,

            ],
            'email' => [
                'required',
                'email',
            ],
            'password' => [
                'required',
                'min:6',
                'confirmed'
            ],
        ];
    }
}
