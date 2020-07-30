<?php

declare(strict_types=1);

namespace App\Http\Rules;

use Illuminate\Contracts\Validation\Rule;

class TimeOrderProductRule implements Rule
{
    public function passes($attribute, $value)
    {
        return  strtotime($value) <= strtotime('+10 day');
    }

    public function message()
    {
        return 'Date in this field must be in 10 day interval';
    }
}
