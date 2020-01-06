<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($user)
    {
        $user = \App\User::find($user);
        return view('profile.index', [
            'user' => $user,
            'address' => $user->address,
        ]);
    }
}
