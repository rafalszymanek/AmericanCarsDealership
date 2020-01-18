<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    const ROLE_CLIENT = 'CLIENT';
    const ROLE_RETAILER = 'RETAILER';
    const ROLE_ADMIN = 'ADMIN';


    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function addresses()
    {
        return $this->hasMany('App\Address', 'user_id', 'id');
    }

    public function defaultAddress()
    {
        return $this
            ->hasOne('App\Address', 'user_id', 'id')
            ->where(['is_default' => 1]);
    }
}
