<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'order_number', 'order_date', 'user_id','order_sum',
    ];


    public function products(){
        return $this->belongsToMany('App\Models\Product');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
