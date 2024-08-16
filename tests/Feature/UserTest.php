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
        $users = User::factory()->count(10)->create();

        foreach ($users as $user) {
            $this->assertNotEmpty($user->description, "User {$user->id} has no skills description.");
            $this->assertStringContainsString('Developer', $user->description, "User {$user->id} does not have valid skills description.");
        }
    }
}
