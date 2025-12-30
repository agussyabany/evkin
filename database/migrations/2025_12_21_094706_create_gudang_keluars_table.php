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
        Schema::create('gudang_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi')->nullable(true);
            $table->integer('id_truk')->nullable(true);
            $table->integer('deliver')->nullable(true);
            $table->integer('penerima')->nullable(true);
            $table->integer('user')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gudang_keluars');
    }
};
