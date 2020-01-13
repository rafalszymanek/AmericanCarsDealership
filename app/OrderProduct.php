<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'orders_products';

    public function products()
    {
        return $this->hasMany('App\Product', 'product_id', 'id');
    }
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
