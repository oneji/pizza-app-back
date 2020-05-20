<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pizza;

class CartController extends Controller
{
    /**
     * Get all the available cart info
     * 
     * @param   \Illuminate\Http\Request $request
     * 
     * @return  \Illuminate\Http\JsonResponse
     */
    public function getInfo(Request $request)
    {
        $cartItems = $request->input();
        // Find the pizza
        $pizzas = Pizza::getForCartInfo($cartItems);

        return response()->json([
            'ok' => true,
            'pizzas' => $pizzas
        ]);
    }
}
