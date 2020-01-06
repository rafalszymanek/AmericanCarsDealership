<?php

namespace App\Http\Controllers;

use App\Product;
use App\Services\BasketService;
use App\Services\ProductUnavailableError;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class BasketController extends BaseController
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function list()
    {
        return view ('basket.list', $this->bindParams([
            'basket' => BasketService::getAll(),
            'basketSummary' => BasketService::basketSummary(),
        ]));
    }

    public function add($productId, Request $request)
    {
        $productId = (int) $productId;
        if (empty($productId)) {
            die('Podaj id produktu');
        }
        try {
            $product = Product::where(['id' => $productId])->firstOrFail();
            BasketService::add($product);
        } catch (ProductUnavailableError $error) {
            $this->error($error->getMessage());
        } catch (ModelNotFoundException $error) {
           $this->error('Produkt nie istnieje');
        } finally {
            $this->success('Produkt dodany do koszyka');
            return redirect()->back();
        }
    }

    public function remove($productId)
    {
        if (empty($productId)) {
            $this->info('Wybierz produkt do usuniecia');
            return redirect()->back();
        }

        BasketService::removeItem($productId);
        $this->success('Produkt został usunięty z koszyka');
        return redirect()->back();
    }
}
