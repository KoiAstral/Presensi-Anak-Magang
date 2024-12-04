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
        Schema::create('sma', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Student's full name
            $table->string('jurusan'); // Department/major
            $table->string('kelas'); // Class level
            $table->string('asal_sekolah'); // Name of the originating school
            $table->string('email')->unique(); // Email address, unique for each student
            $table->timestamps(); // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sma');
    }
};
    