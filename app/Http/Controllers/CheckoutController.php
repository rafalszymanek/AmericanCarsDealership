<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Product;
use App\Services\BasketService;
use App\Services\CheckoutService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


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
        $params = $request->post();
        $validator = Validator::make($params, [
            'name' => 'required|max:255',
            'street' => 'required',
            'house_number' => 'required',
            'postcode' => 'required',
            'city' => 'required',
            'payment_method' => 'required',
            'recollect_place' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $order = new Order();
            $order->name = $params['name'];
            $order->surname = $params['surname'];
            $order->street = $params['street'];
            $order->house_number = $params['house_number'];
            $order->local_number = $params['local_number'];
            $order->postcode = $params['postcode'];
            $order->city = $params['city'];
            $order->recollect_place = $params['recollect_place'];
            $order->payment_method = $params['payment_method'];
            $order->client_id = Auth::id();
            $order->saveOrFail();
            $this->success('Zamowienie zlozone');

            CheckoutService::addProductsToOrder($order->id);
            BasketService::clear();

            return view('checkout.summary', $this->bindParams(['order' => $order]));
        } catch (\Exception $ex) {
            $this->error('Something went wrong' . $ex->getMessage());
            return redirect()->back();
        }
    }

    public function addProductsFromBasket()
    {
        $products = BasketService::getAll();
    }
}
