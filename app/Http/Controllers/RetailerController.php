<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetailerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user == null || $user->role != 'RETAILER') {
            return abort(404);
        }
        # Get all product assigned to retailer
        $products = ('App\Product')::where('retailer_id', 4)->get();

        # Get all orderProducts that product assigned to retailer is ordered
        $orderProductsArray = [];
        foreach ($products as $product) {
            array_push($orderProductsArray, $product->orderProducts[0]); # Array because hasMany realtion :)
        }
        
        # Get all orders assigned to retailer
        $ordersArray = [];
        foreach ($orderProductsArray as $orderProduct) {
            array_push($ordersArray, $orderProduct->order);
        }
        
        # Get all users that ordered a car assigned to our retailer
        $userArray = [];
        foreach ($ordersArray as $order) {
            array_push($userArray, $order->user);
        }




       
        return view('retailer.index', [
            'user' => $user, # Object 
            'products' => $products, # Array
            'orders' => $ordersArray, # Array
            'clients' => $userArray, # Array
        ]);

    }


    public function update(Request $request)
    {   
        $data = request()->toArray();
        $newStatus = $data['status'];
        $order = ('App\Order')::where('id', $request->route('id'))->first();
        
        if ($newStatus != 'noChange') {
            $order->status = $newStatus;
            $order->save();
        }

        return redirect('/retailer');
    }


}