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
        Schema::create('kin_pelayanan', function (Blueprint $table) {
            $table->id();
            $table->integer('JmlPnddkTrlyni')->nullable(true);
            $table->integer('jmlPndkWil')->nullable(true);
            $table->integer('kalKulasiJmlPlgn')->nullable(true);
            $table->integer('JmlPlgnThLl')->nullable(true);
            $table->integer('AduanSlsai')->nullable(true);
            $table->integer('JmlAduan')->nullable(true);
            $table->integer('UjiKualitas')->nullable(true);
            $table->integer('titikUji')->nullable(true);
            $table->BigInteger('JmlAirTrjualDom')->nullable(true);
            $table->integer('JmlPlgnDom')->nullable(true);
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
        Schema::dropIfExists('kin_pelayanan');
    }
};
