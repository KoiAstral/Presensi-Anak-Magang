<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\Hash;

class TestingUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Alice Johnson', // Female user
                'email' => 'alice@example.com', // Sample email
                'role' => 'admin', // Admin role
                'password' => Hash::make('password123'), // Secure hashed password
            ],
            [
                'name' => 'John Smith', // Male user
                'email' => 'john@example.com', // Sample email
                'role' => 'anak_magang', // Anak magang role
                'password' => Hash::make('password123'), // Secure hashed password
            ],
        ];

        foreach ($users as $value) {
            User::create($value); // Use Eloquent to create user records
        }
    }
}
