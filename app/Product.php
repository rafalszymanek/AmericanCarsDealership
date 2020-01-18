<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name', 'description', 'category_id', 'image_src', 'price', 'is_available'];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function orderProducts()
    {
        return $this->hasMany('App\OrderProduct', 'product_id');
    }

    public function retailer()
    {
        return $this->belongsTo('App\Retailer', 'retailer_id', 'id');
    }
}
