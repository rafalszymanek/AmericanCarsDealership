<?php

namespace App\Http\Controllers;

use App\Category;
use App\Services\BasketService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BaseController extends Controller
{
    const ALERT_SUCCESS = 'success';
    const ALERT_ERROR = 'danger';
    const ALERT_INFO = 'info';

    public function alert($type, $message)
    {
        Session::put('alert', ['type' => $type, 'message' => $message]);
    }

    public function success($message)
    {
        $this->alert(self::ALERT_SUCCESS, $message);
    }

    public function error($message)
    {
        $this->alert(self::ALERT_ERROR, $message);
    }

    public function info($message)
    {
        $this->alert(self::ALERT_INFO, $message);
    }

    public function getAlert()
    {
        $alert = Session::get('alert');
        Session::remove('alert');
        return $alert;
    }

    public function bindParams($params = [])
    {
        return array_merge([
            'categories' => Category::where(['parent_id' => 0])->get(),
            'alert' => $this->getAlert(),
            'basket' => BasketService::basketSummary(),
        ], $params);
    }

}
