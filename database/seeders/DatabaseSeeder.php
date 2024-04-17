<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (app()->environment('local')) {
            User::factory()->create([
                'name' => 'User Example',
                'email' => 'example@email.com',
                'password' => Hash::make('secret')
            ]);
        }
    }
}
