<?php
namespace App\Services;

use App\Product;
use Illuminate\Support\Facades\Auth;

class ProductUnavailableError extends \Error {}

class BasketService
{
    const BASKET_SESSION_NAME = 'basket';
    const OUT_OF_STOCK_MESSAGE = 'Produkt niedostepny';

    public static function add(Product $product, $qty = 1)
    {
        $basketItem = [
          'qty' => $qty,
          'product' => $product,
        ];

        if (!$product->is_available) {
            throw new ProductUnavailableError(self::OUT_OF_STOCK_MESSAGE);
        }
        return session()->push(self::BASKET_SESSION_NAME, $basketItem);
    }

    public static function basketSummary()
    {
        $schema = [
            'grandTotal' => 0,
            'productsQty' => 0,
        ];
        $items = self::getAll();
        if (empty($items)) {
            return $schema;
        }
        foreach ($items as $item) {
            $schema['grandTotal'] += $item['product']->price * $item['qty'];
            $schema['productsQty'] += $item['qty'];
        }

        return $schema;
    }

    public static function getAll()
    {
        return session()->get(self::BASKET_SESSION_NAME);
    }

    public static function removeItem($id)
    {
        $currentIndex = 0;
        $id = (int) $id;
        $items = self::getAll();
        foreach ($items as $item) {
            if ($item['product']->id === $id) {
                unset($items[$currentIndex]);
            }
            $currentIndex++;
        }

        self::replaceBasket(array_values($items));
    }

    public static function replaceBasket($newItems)
    {
        return session()->put(self::BASKET_SESSION_NAME, $newItems);
    }
}
