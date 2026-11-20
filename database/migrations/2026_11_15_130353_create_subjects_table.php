<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subjects', function (Blueprint $table) {
            // Kolom Primary Key (ID Mata Pelajaran)
            $table->id();

            // nanti isinya misal: 'Pemrograman Web', 'Basis Data'
            $table->string('name');

        
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
