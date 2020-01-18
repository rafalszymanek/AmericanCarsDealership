<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

class Retailer extends User
{
   protected $table = 'users';

    public static function boot()
   {
       parent::boot();
       static::addGlobalScope('UserRetailer', function(Builder $builder) {
           $builder->where('role', '=', parent::ROLE_RETAILER);
       });
   }
}
