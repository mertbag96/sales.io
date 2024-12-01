<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;

use Illuminate\Support\Str;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $defaultAdminRole = Role::create([
            'name' => 'Admin',
            'description' => 'Admins are the managers of the Sales.io CRM'
        ]);

        if ($defaultAdminRole) {
            User::create([
                'role_id' => $defaultAdminRole->id,
                'company_id' => null,
                'name' => 'John',
                'surname' => 'Doe',
                'email' => 'admin@sales.io',
                'email_verified_at' => now(),
                'password' => 'password',
                'remember_token' => Str::random(10)
            ]);
        }
    }
}
