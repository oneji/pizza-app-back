<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Order;

class OrderTest extends TestCase
{
    public function testsOrdersAreCreatedCorrectly()
    {
        $payload = [
            'total_price_usd' => 10,
            'total_price_euro' => 12,
            'user_id' => null,
            'delivery_address' => 'New York city',
            'contacts' => '+86 13145484961',
            'comment' => 'The best comment ever!',
            'order_items' => []
        ];

        $this->json('POST', '/api/orders', $payload)
            ->assertStatus(200)
            ->assertJson([
                'ok' => true,
                'message' => 'You successfully order some pizzaaaaaa ;)'
            ]);
    }
}
