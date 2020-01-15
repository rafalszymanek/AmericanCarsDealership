<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetailerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user == null || !$user->role != 'RETAILER') {
            return abort(404);
        }



       
        return view('retailer.index');

    }
}