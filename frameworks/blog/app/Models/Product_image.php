<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
    protected $table = 'Product_image';

    public function products(){
        return $this->HasOne('App\Models\Product');
    }
}
