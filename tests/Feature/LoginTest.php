<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class LoginTest extends TestCase
{
    // public function testUserLoginsSuccessfully()
    // {
    //     $user = factory(User::class)->create([
    //         'email' => 'test@test.com',
    //         'password' => bcrypt('123456'),
    //     ]);

    //     $payload = ['email' => 'test@test.com', 'password' => '123456'];

    //     $this->json('POST', 'api/login', $payload)
    //         ->assertStatus(200)
    //         ->assertJsonStructure([
    //             'ok',
    //             'token',
    //             'user'
    //         ]);

    // }
}
