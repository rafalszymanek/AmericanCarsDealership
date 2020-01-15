<?php

namespace App;

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

    }

    public function ordersProduct()
    {
        return $this->hasOne("App\OrderProduct");
    }
}
