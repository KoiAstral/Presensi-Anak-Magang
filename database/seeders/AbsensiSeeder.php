<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan data dummy ke tabel absensi
        DB::table('absensi')->insert([
            [
                'id_absensi' => 'A001',
                'nomor_induk' => '123456',
                'waktu_absensi' => Carbon::now()->format('H:i:s'),
                'jenis_absensi' => 'izin',
                'keterangan' => 'Izin keperluan keluarga',
                'tanggal_mulai' => Carbon::now()->format('Y-m-d'),
                'tanggal_akhir' => Carbon::now()->addDays(2)->format('Y-m-d'),
                'status' => 'approved',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_absensi' => 'A002',
                'nomor_induk' => '654321',
                'waktu_absensi' => Carbon::now()->subDay()->format('H:i:s'),
                'jenis_absensi' => 'sakit',
                'keterangan' => 'Sakit demam',
                'tanggal_mulai' => Carbon::now()->subDays(3)->format('Y-m-d'),
                'tanggal_akhir' => Carbon::now()->subDays(1)->format('Y-m-d'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_absensi' => 'A003',
                'nomor_induk' => '789012',
                'waktu_absensi' => Carbon::now()->subDays(5)->format('H:i:s'),
                'jenis_absensi' => 'izin',
                'keterangan' => 'Izin menghadiri seminar',
                'tanggal_mulai' => Carbon::now()->subDays(6)->format('Y-m-d'),
                'tanggal_akhir' => Carbon::now()->subDays(5)->format('Y-m-d'),
                'status' => 'rejected',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
