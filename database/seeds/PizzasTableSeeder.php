<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\PizzaSize;

class PizzasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pizzaSizes = PizzaSize::all();
        $faker = Faker\Factory::create();
        
        factory(App\Pizza::class, 10)->create()->each(function($pizza) use ($pizzaSizes, $faker) {
            foreach ($pizzaSizes as $size) {
                $pizza->pizza_sizes()->attach($size->id, [
                    'price_usd' => $faker->numberBetween($min = 0, $max = 30),
                    'price_euro' => $faker->numberBetween($min = 0, $max = 30)
                ]);
            }
        });

    }
}
