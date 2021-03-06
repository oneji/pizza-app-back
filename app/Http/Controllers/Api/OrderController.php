<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Order;

class OrderController extends Controller
{
    /**
     * Store a newly created order in the db
     * 
     * @param   \Illuminate\Http\Requests\StoreOrderRequest $request
     * 
     * @return  \Illuminate\Http\JsonResponse
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

        Order::store($orderData);

        return response()->json([
            'ok' => true,
            'message' => 'You successfully order some pizzaaaaaa ;)'
        ]);
    }

    /**
     * Get all orders of the user
     * 
     * @param   \Illuminate\Http\Request $request
     * 
     * @return  \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $orders = Order::getAll($user->id);

        return response()->json([
            'ok' => true,
            'orders' => $orders
        ]);
    }
}
