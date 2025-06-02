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
            $table->string('nim', 10)->primary();
            $table->string('nama', 100);
            $table->string('tanggal_lahir', 20)->nullable();
            $table->string('telpon', 20)->nullable();
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->string('foto', 255)->nullable();
            $table->string('id', 36)->nullable();
        }) 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
