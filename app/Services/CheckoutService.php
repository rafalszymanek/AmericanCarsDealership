<?php
namespace App\Services;

use App\OrderProduct;
use App\Orders_products;
use App\Product;
use Illuminate\Support\Facades\Auth;

class CheckoutService
{
    public static function addSingleProductToOrder($orderId, $productId)
    {
        // @TODO: Respect qty for each product
        $ordersProduct = new OrderProduct();
        $ordersProduct->order_id = $orderId;
        $ordersProduct->product_id = $productId;
        $ordersProduct->saveOrFail();

        self::disableProduct($productId);
    }

    public static function addProductsToOrder($orderId)
    {
        $basket = BasketService::getAll();
        foreach ($basket as $item) {
            self::addSingleProductToOrder($orderId, $item['product']->id);
        }
    }

    public static function disableProduct($productId)
    {
        $product = Product::where(['id' => $productId])->firstOrFail();
        $product->is_available = false;
        $product->save();
    }
}
