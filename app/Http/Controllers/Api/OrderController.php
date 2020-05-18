<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Order;

class OrderController extends Controller
{
    /**
     * 
     */
    public function store(StoreOrderRequest $request)
    {
        $orderData = [
            'total_price_usd' => $request->total_price_usd,
            'total_price_euro' => $request->total_price_euro,
            'user_id' => $request->user_id,
            'delivery_address' => $request->delivery_address,
            'contacts' => $request->contacts,
            'comment' => $request->comment,
            'orderItems' => $request->orderItems
        ];

        $order = Order::store($orderData);

        return response()->json([
            'ok' => true,
            'message' => 'You successfully order some pizzaaaaaa ;)',
            'order' => $orderData
        ]);
    }
}
