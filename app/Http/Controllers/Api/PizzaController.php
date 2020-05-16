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
     * 
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
     * 
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
