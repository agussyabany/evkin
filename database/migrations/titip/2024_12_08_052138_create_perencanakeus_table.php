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
        Schema::create('umum_perencanakeus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('realTerima')->nullable(true);
            $table->bigInteger('penerimaan')->nullable(true);
            $table->bigInteger('trgtAnggaran')->nullable(true);
            $table->bigInteger('realDapat')->nullable(true);
            $table->bigInteger('pendapatan')->nullable(true);
            $table->bigInteger('reaLinvets')->nullable(true);
            $table->bigInteger('investasi')->nullable(true);
            $table->bigInteger('paguInvst')->nullable(true);
            $table->bigInteger('realBiaya')->nullable(true);
            $table->bigInteger('biaya')->nullable(true);
            $table->bigInteger('paguBiaya')->nullable(true);
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
        Schema::dropIfExists('umum_perencanakeus');
    }
};
