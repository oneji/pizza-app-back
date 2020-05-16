<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PizzaCategory extends Model
{
    public $timestamps = false;

    /**
     * Get the pizzas for the category.
     */
    public function pizzas()
    {
        return $this->hasMany('App\Pizza');
    }
}
