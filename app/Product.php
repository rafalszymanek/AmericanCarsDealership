<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name', 'description', 'category_id', 'image_src', 'price'];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

}
