<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();

            // Nama lengkap guru
            $table->string('name');

            $table->string('niy');

            // Foreign Key One-to-One ke tabel subjects
            $table->foreignId('subject_id')
                  ->unique()
                  ->constrained('subjects');

            // Tanggal mulai mengajar
            $table->date('start_date');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
