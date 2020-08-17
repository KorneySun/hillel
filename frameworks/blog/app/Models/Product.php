<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $package
 * @property int $categoty_id
 * @property float $price
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */

class Product extends Model
{
    protected $table = 'products';


    public function order_products(){
        return $this->hasMany('App\Models\Order_product');
    }

    public function categories(){
        return $this->HasOne('App\Models\Category');
    }
    public function resolveRouteBinding($value, $field = null)
    {
        return $this
            ->where('id', $value)
            ->first();
    }
}
