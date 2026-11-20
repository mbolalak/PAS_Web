<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations (Dijalankan saat: php artisan migrate)
     */
    public function up(): void
    {
        Schema::create('classrooms', function (Blueprint $table) {
            // Kolom Primary Key (Auto Increment ID)
            $table->id();

            // Kolom Nama Kelas (misal: '11 pplg 1', '11 dkv 2')
            $table->string('name');

            // Kolom Jurusan (misal: 'PPLG', 'DKV', 'ANIMASI')
            $table->string('major');

            // Otomatis membuat 2 kolom: created_at dan updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations (Dijalankan saat rollback: php artisan migrate:rollback / fresh)
     */
    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};
