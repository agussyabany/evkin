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
        Schema::create('kin_sdm', function (Blueprint $table) {
            $table->id();
            $table->integer('JmlPgwai')->nullable(true);
            $table->integer('JmlPlgn1000')->nullable(true);
            $table->integer('JmlPegDiklat')->nullable(true);
            $table->integer('RealByDiklat')->nullable(true);
            $table->integer('RealByPeg')->nullable(true);
            $table->string('bulanTahun')->nullable(true);
            $table->integer('status')->nullable(true);
            $table->integer('user')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kin_sdm');
    }
};
