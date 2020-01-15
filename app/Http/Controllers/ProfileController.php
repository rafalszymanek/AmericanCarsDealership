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

        # Get all orders that belong to client
        $orders = $user->orders;
        $arrayClientProducts = []; # Collect all ordered products
        $arrayCategories = []; # Collect all catergories to ordered products

        # Put all products and categories ordered by client to array
        foreach ($orders as $order) {
            # Product
            $orderProduct = $order->ordersProduct;
            $productArray = $orderProduct->products->toArray();
            $product = $productArray[0]; # Idk why array is in array
            
            array_push($arrayClientProducts, $product);

            # Category
            $category = ('App\Category')::find($product['category_id']);
            array_push($arrayCategories, $category);

        }

        # Send it to  view /profile.index
        return view('profile.index', [
            'user' => $user, # Object
            'address' => $address_array[0], # Object
            'orders' => $orders, # Array
            'products' => $arrayClientProducts, # Array
            'categories' => $arrayCategories, # Array
        ]);
    }
}
