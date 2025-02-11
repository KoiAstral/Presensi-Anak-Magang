<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'nama' => 'Admin User',
                'nomor_induk' => 'A001',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'status' => 'admin',
                'sekolah' => null, // Admin does not have a school, so set to NULL
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Regular User',
                'nomor_induk' => 'U001',
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
                'status' => 'siswa',
                'sekolah' => 'SMK Telkom Banjarbaru', // Provide a value
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
    }
}

