<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const BANK_TRANSFER_PAYMENT_METHOD = 'bank_transfer';
    const CASH_PAYMENT_METHOD = 'cash';

    const STATUS_NEW = 'new';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_COMPLETED = 'completed';

    public static $paymentMethods = [
        self::BANK_TRANSFER_PAYMENT_METHOD => 'Przelew',
        self::CASH_PAYMENT_METHOD => 'Gotówka',
    ];

    public static $statuses = [
        self::STATUS_NEW => 'Nowe',
        self::STATUS_IN_PROGRESS => 'W przygotowaniu',
        self::STATUS_COMPLETED => 'Zakończone',
    ];

    public static function getStatuses()
    {
        return static::$statuses;
    }
    public static $recollectionMethods = [
        'wro' => 'Wrocław',
        'krk' => 'Kraków',
    ];

    public static function getPaymentMethods()
    {
        return static::$paymentMethods;
    }

    public static function getRecollectionPlaces()
    {
        return static::$recollectionMethods;
    }

    public function user()
    {
        return $this->hasOne("App\User", "id", "client_id");
    }


    public static function boot()
    {
        parent::boot();
        self::creating(function($model) {
            $model->status = self::STATUS_NEW;
        });

        Carbon::setLocale('pl');
    }

    public function orderProducts()
    {
        return $this->hasMany('App\OrderProduct');
    }

    public function getFormattedPaymentMethod()
    {
        return isset(self::$paymentMethods[$this->payment_method])
            ? self::$paymentMethods[$this->payment_method]
            : 'b/d';
    }

    public function getFormattedRecollectionMethod()
    {
        return isset(self::$recollectionMethods[$this->recollect_place])
            ? self::$recollectionMethods[$this->recollect_place]
            : 'b/d';
    }

    public function getFormattedStatus()
    {
        return isset(self::$statuses[$this->status])
            ? self::$statuses[$this->status]
            : 'b/d';
    }
}
