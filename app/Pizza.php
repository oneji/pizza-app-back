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

    public static function getAll()
    {
        return static::with('pizza_sizes')->get();
    }

    /**
     * 
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
     * 
     */
    public static function getById($pizzaId)
    {
        return static::with('pizza_sizes')->where('id', $pizzaId)->first();
    }
}
