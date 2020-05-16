<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PizzaSize extends Model
{
    public $timestamps = false;

    /**
     * The pizza that belong to the size.
     */
    public function pizza()
    {
        return $this->belongsToMany('App\Pizza');
    }
}
