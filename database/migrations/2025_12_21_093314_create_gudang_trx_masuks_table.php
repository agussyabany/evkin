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
        Schema::create('gudang_trx_masuk', function (Blueprint $table) {
            $table->id();
            $table->integer('id_masuk')->nullable(true);
            $table->integer('id_bahan')->nullable(true);
            $table->integer('jumlah')->nullable(true);
            $table->integer('status')->default(0)->nullable(true);
            $table->integer('user')->nullable('true');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gudang_trx_masuks');
    }
};
