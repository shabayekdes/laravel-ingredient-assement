<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Jobs\IncrementOrderQuantity;
use App\Models\Ingredient;
use App\Models\Order;
use App\Models\Product;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @var \App\Services\OrderService
     */
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateOrderRequest $request)
    {
        $order = Order::create();
        $order_total = $this->orderService->createOrder($order, $request->get('products'));
        $order->update(['order_total' => $order_total]);

        return response()->json([
            'success' => true,
            'message' => 'Order was created successfully',
            'data' => $order
        ]);
    }
}
