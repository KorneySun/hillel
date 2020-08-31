<?php

declare(strict_types=1);

namespace App\Http\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Category;

class CheckCategoriesListRule implements Rule
{
    public function passes($attribute, $value)
    {
        return Category::where('id', $value)->exists();
    }

    public function message()
    {
        return 'Данного значения нет в списке возможных категорий';
    }
}
