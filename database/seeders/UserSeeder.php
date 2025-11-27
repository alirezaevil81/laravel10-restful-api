<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->state([
            'first_name' => 'Admin',
            'last_name' => 'Admin pour',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ])->create();
        User::factory(10)->create();
    }
}
