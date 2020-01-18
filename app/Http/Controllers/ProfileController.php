<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends BaseController
{
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders;
        return view('profile.index', $this->bindParams([
            'user' => $user,
            'address' => $user->defaultAddress,
            'orders' => $orders,
        ]));
    }
}
