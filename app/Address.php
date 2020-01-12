<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = [
        'name',
        'surname',
        'street',
        'house_number',
        'local_number',
        'postcode',
        'city',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
