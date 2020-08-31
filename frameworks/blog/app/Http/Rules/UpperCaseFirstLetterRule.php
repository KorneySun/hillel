<?php

declare(strict_types=1);

namespace App\Http\Rules;

use Illuminate\Contracts\Validation\Rule;

class UpperCaseFirstLetterRule implements Rule
{
    public function passes($attribute, $value)
    {
        mb_substr($value,0,1) === strtoupper(mb_substr($value,0,1));

        return mb_substr($value,0,1) === strtoupper(mb_substr($value,0,1));
    }

    public function message()
    {
        return 'First letter in The :attribute must be in Upper Case';
    }
}
