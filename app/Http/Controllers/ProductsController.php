<?php

namespace App\Http\Controllers;

use App\Product;


class ProductsController extends BaseController
{
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

    public function details($id)
    {
        $id = (int)$id;
        $product = Product::where(['id' => $id])->first();
        return view('productsDetails', $this->bindParams([
            'product' => $product,
        ]));
    }
}
