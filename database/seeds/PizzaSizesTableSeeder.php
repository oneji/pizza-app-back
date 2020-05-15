<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaSizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizza_sizes')->insert([
            [ 'name' => 'Small' ],
            [ 'name' => 'Medium' ],
            [ 'name' => 'Large' ]
        ]);
    }
}
