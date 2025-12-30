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
        Schema::create('gudang_stok_log', function (Blueprint $table) {
            $table->id();
            $table->integer('id_bahan')->nullable(true);
            $table->integer('awal')->nullable(true);
            $table->integer('keluar')->nullable(true);
            $table->integer('akhir')->nullable(true);
            $table->integer('permintaan_id')->nullable(true);
            $table->integer('user_id')->nullable(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gudang_stok_log');
    }
};
