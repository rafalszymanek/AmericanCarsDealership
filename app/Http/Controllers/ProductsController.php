<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;


class ProductsController extends BaseController
{
    public function all()
    {
        $allProducts = Product::where(['is_available' => 1])->get();
        return view('products',$this->bindParams(['products' => $allProducts]));
    }

    public function category($id)
    {
        $products = Product::where([
            'category_id' => $id,
            'is_available' => 1
        ])->get();
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

    //method below allows to implement SQL injection "UNION select email, password from users" after ?id=1
    public function detailsVulnerable()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $product = DB::select( DB::raw("SELECT id, name FROM products WHERE id = $id") );
        dd($product);
        return view('productsDetails', $this->bindParams([
            'product' => $product[0],
        ]));
    }
}
