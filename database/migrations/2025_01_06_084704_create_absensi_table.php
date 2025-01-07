<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id('id_absensi');
            $table->string('nomor_induk');
            $table->date('tanggal_absensi');
            $table->time('waktu_absensi');
            $table->enum('jenis_absensi', ['sakit', 'izin']);
            $table->string('keterangan');
            $table->enum('status', ['approved', 'pending', 'rejected']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
