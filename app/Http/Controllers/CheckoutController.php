<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CheckoutController extends BaseController
{
    public function __construct()
    {
//        $this->middleware('auth');
    }


    public function viewOrder()
    {
        return view ('checkout');
    }

    public function sendOrder(Request $request)
    {

    }


}
