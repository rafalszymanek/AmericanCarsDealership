<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = ['house_no', 'street', 'postcode', 'city'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
