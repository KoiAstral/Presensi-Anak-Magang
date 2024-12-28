<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama'         => 'Admin User',
                'nomor_induk'  => 'A001',
                'email'        => 'admin@example.com',
                'password'     => Hash::make('admin123'),
                'status'       => 'mahasiswa',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'nama'         => 'Regular User',
                'nomor_induk'  => 'U001',
                'email'        => 'user@example.com',
                'password'     => Hash::make('user123'),

                'status'       => 'siswa',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);
    }
}
