<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_have_skills()
    {
        User::factory()->count(10)->create();

        $response = $this->get('/users');

        $response->assertStatus(200);
        $response->assertJsonCount(10);

        $users = $response->json();
        foreach ($users as $user) {
            $this->assertNotEmpty($user['description']);
        }
    }
}

