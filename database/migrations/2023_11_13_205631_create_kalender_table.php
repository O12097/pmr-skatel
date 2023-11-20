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
        // Schema::create('kalender', function (Blueprint $table) {
        //     $table->integerIncrements('id_kalender')->primary();
        //     $table->foreign('id_kegiatan')->references('id_kegiatan')->on('kegiatan');
        //     $table->dateTime('tanggal_presensi');
        //     $table->enum('status_kegiatan', ['rencana', 'berlangsung', 'selesai']);
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kalender');
    }
};
