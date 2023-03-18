<?php

namespace App\Services;

use App\Jobs\IncrementOrderQuantity;
use App\Models\Product;

class OrderService
{
    public function createOrder($order, $items)
    {
        $order_total = 0;
        foreach ($items as $item){
            $order->items()->create($item);

            $product = Product::find($item['product_id']);
            $order_total += $product->price * $item['quantity'];
            IncrementOrderQuantity::dispatch($product, $item['quantity']);
        }

        return $order_total;
    }
}
