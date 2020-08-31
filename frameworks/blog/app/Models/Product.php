<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
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
    protected $fillable = [
        'name', 'description',  'package', 'category_id', 'price'
    ];


    public function orders(){
        return $this->hasMany('App\Models\Order');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function product_images(){
        return $this->hasMany('App\Models\ProductImage');
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this
            ->where('id', $value)
            ->first();
    }
}
