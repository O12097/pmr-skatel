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
        // Schema::create('presensi', function (Blueprint $table) {
        //     $table->integerIncrements('id_presensi')->primary();
        //     $table->string('nis', 15);
        //     $table->foreign('nis')->references('nis')->on('siswa');
        //     $table->dateTime('tanggal_presensi');
        //     $table->enum('status_presensi', ['hadir', 'izin', 'sakit']);
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi');
    }
};
