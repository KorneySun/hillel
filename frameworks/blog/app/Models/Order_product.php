<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    protected $table = 'order_products';
    protected $fillable = [
        'order_id', 'product_id', 'product_quantity'
    ];


    public function orders(){
        return $this->HasOne('App\Models\Order');
    }

    public function products(){
        return $this->HasOne('App\Models\Product');
    }
}
