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
    //     Schema::create('users', function (Blueprint $table) {
    //         $table->integerIncrements('id_user')->primary();
    //         $table->string('nama_siswa', 50);
    //         $table->string('nis', 15)->nullable();
    //         $table->foreign('nis', 15)->references('nis')->on('siswa');
    //         $table->string('email', 50);
    //         $table->string('password', 100);
    //     });
    // }

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //     Schema::table('users', function (Blueprint $table) {
    //         $table->dropForeign(['nis']);
    //         $table->dropColumn('nis');
    //     });

    //     Schema::dropIfExists('users');

    // }
};
