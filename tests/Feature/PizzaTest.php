<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;
use App\Pizza;

class PizzaTest extends TestCase
{
    public function testPizzasAreListedCorrectly()
    {
        $now = Carbon::now();
        factory(Pizza::class)->create([
            'name' => 'Pizza',
            'image' => null,
            'pizza_category_id' => '1',
            'description' => 'Pizza description'
        ]);

        $response = $this->json('GET', '/api/pizzas', [])
            ->assertStatus(200)
            ->assertJson([
                'ok' => true,
                'pizzas' => [
                    [
                        'id' => 1,
                        'name' => 'Pizza',
                        'image' => null,
                        'pizza_category_id' => '1',
                        'description' => 'Pizza description'
                    ]
                ]
            ]);
    }
}
