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
        Schema::create('presensi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('nomor_induk');
            $table->foreign('nomor_induk')->references('nomor_induk')->on('users')->onDelete('cascade');
            $table->date('tanggal_presensi');
            $table->time('waktu_presensi');
            $table->string('status')->default('approved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi');
    }
};
