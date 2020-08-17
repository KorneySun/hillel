<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'order_number', 'order_date', 'user_id','order_sum',
    ];


    public function order_products(){
        return $this->hasMany('App\Models\Order_product');
    }
    public function users(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
