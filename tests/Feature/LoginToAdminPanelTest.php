<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginToAdminPanelTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */


    public function test_login_validation(): void
    {
        $response = $this->post('/api/admin/login');
        $response->assertStatus(422);
    }

    public function test_an_admin_can_login_to_admin_panel_with_correct_data(): void
    {
        $response = $this->post('/api/admin/login', [
            'email' => 'admin@gmail.com',
            'password' => '12345678'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);


    }

    public function test_an_admin_cannot_login_to_admin_panel_with_wrong_data(): void
    {
        $response = $this->post('/api/admin/login', [
            'email' => 'admin@gmail.com',
            'password' => '123'
        ]);

        $response->assertStatus(401);

    }


}
