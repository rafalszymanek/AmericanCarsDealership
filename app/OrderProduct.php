<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'orders_products';

    public function products()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
