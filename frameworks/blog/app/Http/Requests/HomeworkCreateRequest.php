<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Http\Rules\UpperCaseFirstLetterRule;
use Illuminate\Foundation\Http\FormRequest;

class HomeworkCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
}
