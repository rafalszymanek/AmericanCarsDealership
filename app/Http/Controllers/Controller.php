<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function test(Request $request)
    {
        $product = new Product();
        $product->name = 'Testowy';
        $product->description = 'jakiś opis';
        $product->price = 200;
        $product->category_id = 0;
        $product->save();
    }

    public function test2(Request $request)
    {
        dd(DB::statement('select id, name from products'));
    }
}
