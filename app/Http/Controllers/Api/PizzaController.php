<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pizza;
use App\PizzaSize;
use App\PizzaCategory;

class PizzaController extends Controller
{
    /**
     * Get all the pizzas from the db
     * 
     * @param   \Illuminate\Http\Request $request
     * 
     * @return  \Illuminate\Http\JsonResponse
     */
    public function getAll(Request $request)
    {
        $pizzas = Pizza::getAll();
        $sizes = PizzaSize::all();
        $categories = PizzaCategory::all();

        return response()->json([
            'ok' => true,
            'pizzas' => $pizzas,
            'sizes' => $sizes,
            'categories' => $categories
        ]);
    }

    /**
     * Get pizzas by category
     * 
     * @param   int $categoryId
     * 
     * @return  \Illuminate\Http\JsonResponse
     */
    public function getByCategory($categoryId)
    {
        $pizzas = Pizza::getByCategory($categoryId);

        return response()->json([
            'ok' => true,
            'pizzas' => $pizzas
        ]);
    }

    /**
     * Get pizza by id
     * 
     * @param   int $pizzaId
     * 
     * @return  \Illuminate\Http\JsonResponse
     */
    public function getById($pizzaId)
    {
        $pizza = Pizza::getById($pizzaId);

        return response()->json([
            'ok' => true,
            'pizza' => $pizza
        ]);
    }
}
