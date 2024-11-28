<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'John',
            'surname' => 'Doe',
            'email' => 'johndoe@example.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);
    }
}
