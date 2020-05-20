<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    /**
     * The sizes that belong to the pizza.
     */
    public function pizza_sizes()
    {
        return $this->belongsToMany('App\PizzaSize')->withPivot([ 'price_usd', 'price_euro' ]);
    }
    
    /**
     * Get the category that owns the pizza.
     */
    public function pizza_category()
    {
        return $this->belongsTo('App\PizzaCategory');
    }

    /**
     * Get all availabel pizzas
     * 
     * @return collection
     */
    public static function getAll()
    {
        return static::with('pizza_sizes')->get();
    }

    /**
     * Get pizzas by category
     * 
     * @param int $categoryId
     * 
     * @return collection
     */
    public static function getByCategory($categoryId)
    {
        if($categoryId == null || $categoryId === 'null') {
            return static::getAll();
        }

        return static::where('pizza_category_id', $categoryId)
            ->with('pizza_sizes')
            ->get();
    }

    /**
     * Get the pizza by id
     * 
     * @param int $pizzaId
     * 
     * @return object
     */
    public static function getById($pizzaId)
    {
        return static::with('pizza_sizes')->where('id', $pizzaId)->first();
    }

    /**
     * Get info for cart
     * 
     * @param array $cartItems
     * 
     * @return collection $pizzas
     */
    public static function getForCartInfo($cartItems)
    {
        $pizzas = [];
        foreach ($cartItems as $item) {
            $pizza = static::with('pizza_sizes')->where('id', $item['pizzaId'])->first();
            // Determine total prices by pizza size
            foreach ($pizza->pizza_sizes as $size) {
                if($size->id == $item['sizeId']) {
                    $pizza->total_price_usd = $size->pivot->price_usd * $item['quantity'];
                    $pizza->total_price_euro = $size->pivot->price_euro * $item['quantity'];
                    $pizza->quantity = $item['quantity'];
                    $pizza->size_name = $size->name;
                    $pizza->item_id = $item['id'];
                    $pizza->price_usd = $size->pivot->price_usd;
                    $pizza->price_euro = $size->pivot->price_euro;
                }
            }

            $pizzas[] = $pizza;
        }

        return $pizzas;
    }
}
