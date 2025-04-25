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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('NIM', 15)->primary();
            $table->string('Nama', 100);
            $table->string('Alamat', 150);
            $table->string('Nohp', 15);
            $table->tinyInteger('Semester');
            $table->unsignedBigInteger('id_Gol');
            $table->foreign('id_Gol')->references('id_Gol')->on('golongan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
