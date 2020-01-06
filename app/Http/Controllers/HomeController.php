<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $randomProducts = Product::where(['is_available' => 1])
            ->orderBy(
                DB::raw('RAND()')
            )
            ->limit(4)
            ->get();
        return view('home', $this->bindParams([
            'randomProducts' => $randomProducts,
        ]));
    }
}
