<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterUserByAdminTest extends TestCase
{

    use RefreshDatabase;

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


    public function test_an_admin_can_register_new_user(): void
    {
        $admin = User::whereEmail('admin@gmail.com')->first();
        $response = $this->actingAs($admin)->post(route('users.store',[
            'first_name' => 'Test',
            'last_name' => 'Test pour',
            'email' => 'test@gmail.com',
            'password' => bcrypt('12345678'),
        ]));

        $response->assertStatus(200);
        $response->assertJsonStructure(['message']);
        $response->assertJson(['message' => 'User created successfully']);

        $registeredUser = User::findOrFail($response->json('data')['id']);

        $this->assertEquals($registeredUser->email, 'test@gmail.com');
    }
}
