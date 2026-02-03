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
        Schema::create('gudang_ipa_masuk', function (Blueprint $table) {
            $table->id();
            $table->integer('id_transaksi')->nullable(true);
            $table->integer('id_ipa')->nullable(true);
            $table->integer('id_truk')->nullable(true);
            $table->integer('pengirim')->nullable(true);
            $table->integer('user')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ipa_masuks');
    }
};
