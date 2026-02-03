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
        Schema::create('gudang_ipatrx_masuk', function (Blueprint $table) {
            $table->id();
            $table->integer('id_transaksi')->nullable(true);
            $table->integer('id_bahan')->nullable(true);
            $table->integer('satuan')->nullable(true);
            $table->integer('jumlah')->nullable(true);
            $table->integer('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ipa_trx_masuks');
    }
};
