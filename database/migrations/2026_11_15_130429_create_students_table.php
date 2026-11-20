<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            // Nama lengkap siswa
            $table->string('nama');

            // Nomor Induk Siswa (NIS)
            $table->string('nis');

            // Foreign Key merujuk ke tabel classrooms.id
            $table->foreignId('classroom_id')->constrained('classrooms');

            // Alamat tempat tinggal siswa
            $table->string('address');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
