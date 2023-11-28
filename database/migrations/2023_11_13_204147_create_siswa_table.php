<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('siswa', function (Blueprint $table) {
    //         $table->string('nis', 15)->primary();
    //         $table->string('nama_siswa', 50);
    //         $table->foreignId('id_jurusan')->constrained('jurusan');
    //         $table->foreignId('id_kelas')->constrained('kelas');
    //         $table->string('email', 50);
    //         $table->string('no_telp', 15);
    //         $table->enum('status', ['aktif', 'tidak_aktif']);
    //     });
    // }

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //     Schema::dropIfExists('siswa');
    // }
};
