<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Services\BasketService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CheckoutController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function viewOrder()
    {
        return view ('checkout.form', $this->bindParams([
            'defaultAddress' => Auth::user()->defaultAddress,
            'basketSummary' => BasketService::basketSummary(),
        ]));
    }

    public function sendOrder(Request $request)
    {

    }


}
