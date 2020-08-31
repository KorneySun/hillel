<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductImage extends Model
{
    protected $table = 'product_images';

    protected $fillable = ['image' ];

    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
