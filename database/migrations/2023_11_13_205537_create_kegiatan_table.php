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
        // Schema::create('kegiatan', function (Blueprint $table) {
        //     $table->integerIncrements('id_kegiatan')->primary();
        //     $table->string('nama_kegiatan', 100);
        //     $table->string('tautan_dokumentasi')->nullable();
        //     $table->string('deskripsi', 100)->nullable();
        //     $table->date('tanggal')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};
