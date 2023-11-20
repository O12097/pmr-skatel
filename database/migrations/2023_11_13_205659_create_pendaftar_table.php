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
        // Schema::create('pendaftar', function (Blueprint $table) {
        //     $table->integerIncrements('id_pendaftar')->primary();
        //     $table->string('nis', 15);
        //     $table->string('email', 50);
        //     $table->string('nama_siswa', 50);
        //     $table->enum('kelas', ['X', 'XI', 'XII']);
        //     $table->enum('jurusan', ['RPL', 'DKV', 'TJKT', 'TJAT', 'TKJ', 'ANIM']);
        //     $table->string('no_telp', 15);
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftar');
    }
};
