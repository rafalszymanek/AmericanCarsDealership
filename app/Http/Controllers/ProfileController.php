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
        $arrayOfCategories = [];

        # Put all products ordered by client to array
        foreach ($orders as $order) {
            $orderProduct = $order->ordersProduct;
            $productArray = $orderProduct->products->toArray();
            $product = $productArray[0];
            
            array_push($arrayOfClientProducts, $product);

            $category = ('App\Category')::find($product['category_id']);
            array_push($arrayOfCategories, $category);

           

        }

        # Send it to  view /profile.index
        return view('profile.index', [
            'user' => $user,
            'address' => $address_array[0],
            'orders' => $orders,
            'products' => $arrayOfClientProducts,
            'categories' => $arrayOfCategories,
        ]);
    }
}
