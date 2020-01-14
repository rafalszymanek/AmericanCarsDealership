<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        # Get data about personal info of client
        $user = Auth::user();
        $address = $user->addresses;
        $address_array = $address->toArray();

        # Get all orders that belongs to client
        $orders = $user->orders;
        $arrayOfClientProducts = []; # Array to collect all ordered products

        foreach ($orders as $order) {
            $orderProduct = $order->ordersProduct;
            $productArray = $orderProduct->products->toArray();
            $product = $productArray[0];
            array_push($arrayOfClientProducts, $product);
            
        }
        
        return view('profile.index', [
            'user' => $user,
            'address' => $address_array[0],
            'products' => $arrayOfClientProducts,
        ]);
    }
}
