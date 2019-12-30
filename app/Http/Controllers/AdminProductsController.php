<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminProductsController extends BaseController
{
    const PRODUCT_ADDED_MESSAGE = 'Produkt zostal dodany';
    const PRODUCT_ERROR_MESSAGE = 'Wystapil problem z dodaniem produktu do bazy.';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addProductForm()
    {
        $categories = Category::where(['parent_id' => 0])->get();
        return view('admin.products.add', [
            'categories' => $categories,
            'alert' => Session::get('alert'),
        ]);
    }

    public function addProductAction(Request $request)
    {
//        $name = $request->input('name', null);
//        $description = $request->input('description', null);
//        $imageSrc = $request->input('image_src', null);
//        $price = $request->input('price', 0);
//        $categoryId = $request->input('category_id', 0);
//        $year = $request->input('year', 0);
//        $isAvailable = $request->input('is_available', 1);
//        $retailerId = $request->input('retailer_id', 0);
//        $color = $request->input('color', null);
//        $bodyType = $request->input('body_type', null);
//        $engine = $request->input('engine', null);
        try {
            $params = $request->all();
            $product = new Product();
            foreach ($params as $key => $value) {
                if ($key === '_token') {
                    continue;
                }
                $product->$key = $value;
            }
            $product->is_available = true;
            $product->saveOrFail();
            $this->success(self::PRODUCT_ADDED_MESSAGE);
        } catch (\Exception $ex) {
            $this->error(self::PRODUCT_ERROR_MESSAGE);
        }
        return redirect()->back();
    }
}
