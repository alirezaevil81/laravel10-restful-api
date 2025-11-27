<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterUserByAdminTest extends TestCase
{
    public function test_authentication(): void
    {
        $this->post(route('users.store'))->assertStatus(401);
    }

    public function test_authorization(): void
    {
        $user = User::whereEmail('user@gmail.com')->first();
        $this->actingAs($user)->post(route('users.store'))->assertStatus(403);
    }

    public function test_validation(): void
    {
        $admin = User::whereEmail('admin@gmail.com')->first();
        $this->actingAs($admin)->post(route('users.store'))->assertStatus(422);
    }


    /**
     * A basic feature test example.
     */
    public function test_an_admin_can_register_new_user(): void
    {

    }
}
