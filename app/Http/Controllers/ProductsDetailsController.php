<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProductsDetailsController extends BaseController
{
    public function __construct()
    {
    }

    public function productsDetails($id)
    {
        $product = Product::where(['id' => $id])->first();
        return view('productsDetails', ['product' => $product]);
    }
}
