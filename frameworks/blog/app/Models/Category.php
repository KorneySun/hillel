<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Category extends Model
{
    protected $table = 'categories';

    public function products(){
        return $this->hasMany('App\Models\Product');
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this
            ->where('id', $value)
            ->first();
    }
}
