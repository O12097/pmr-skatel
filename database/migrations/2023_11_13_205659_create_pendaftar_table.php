<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    // public function up(): void
    // {
    //     Schema::create('pendaftar', function (Blueprint $table) {
    //         $table->integerIncrements('id_pendaftar')->primary();
    //         $table->string('nis', 15);
    //         $table->string('email', 50);
    //         $table->string('nama_siswa', 50);
    //         $table->foreignId('id_jurusan')->constrained('jurusan');
    //         $table->foreignId('id_kelas')->constrained('kelas');
    //         $table->string('no_telp', 15);
    //         $table->enum('status', ['pending', 'terima', 'tidak'])->default('pending');
    //     });
    // }

    // public function down(): void
    // {
    //     Schema::dropIfExists('pendaftar');
    // }
};
