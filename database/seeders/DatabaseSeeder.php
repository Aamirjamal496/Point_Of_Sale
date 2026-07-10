<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Super Admin',
        //     'email' => 'admin@pos.com',
        //     'password' => Hash::make('Admin@123'),
        //     'role' => 'Admin',
        //     'email_verified_at' => Date::now(),
        // ]);
        User::factory()->create([
            'name' => 'Cashier',
            'email' => 'cashier@pos.com',
            'password' => Hash::make('Cashier@123'),
            'role' => 'Cashier',
            'email_verified_at' => Date::now(),
        ]);
    }
}
