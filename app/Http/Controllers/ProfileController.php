<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $address = $user->addresses;
        $address_array = $address->toArray();
        return view('profile.index', [
            'user' => $user,
            'address' => $address_array[0],
        ]);
    }
}
