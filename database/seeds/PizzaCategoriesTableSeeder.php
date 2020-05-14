<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizza_categories')->insert([
            [ 'name' => 'Meet pizzas' ],
            [ 'name' => 'Vegetarian' ],
            [ 'name' => 'Cheese pizzas' ],
        ]);
    }
}
