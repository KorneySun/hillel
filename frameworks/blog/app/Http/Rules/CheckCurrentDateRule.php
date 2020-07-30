<?php

declare(strict_types=1);

namespace App\Http\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckCurrentDateRule implements Rule
{
    public function passes($attribute, $value)  {

            return strtotime(date('d-m-Y')) <= strtotime($value);
    }

    public function message()
    {
        return 'Date in this field must be current or later';
    }
}
