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
        Schema::create('teknik_produksis', function (Blueprint $table) {
            $table->id();
            $table->integer('kapsTerpasang')->nullable(true);
            $table->bigInteger('VolProduksi')->nullable(true);
            $table->bigInteger('volAirbaku')->nullable(true);
            $table->integer('kualitasAir')->nullable(true);
            $table->integer('ttkUji')->nullable(true);
            $table->integer('ttkUjiSyarat')->nullable(true);
            $table->string('bulanTahun')->nullable(true);
            $table->integer('dept')->nullable(true);
            $table->integer('user')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teknik_produksis');
    }
};
