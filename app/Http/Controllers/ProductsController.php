<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProductsController extends BaseController
{
    public function __construct()
    {
    }

    public function all()
    {
        $allProducts = Product::all();
        return view('products',$this->bindParams(['products' => $allProducts]));
    }

    public function category($id)
    {
        $products = Product::where(['category_id' => $id])->get();
        return view('products', $this->bindParams([
            'products' => $products,
            'currentCategoryId' => $id
        ]));
    }


}
