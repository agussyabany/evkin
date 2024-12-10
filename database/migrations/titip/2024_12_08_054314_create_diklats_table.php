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
        Schema::create('sdm_diklats', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlahPeg');
            $table->integer('PegDiklat');
            $table->bigInteger('realBiayaDiklt');
            $table->bigInteger('RealBiayaPeg');
            $table->integer('pegTtp');
            $table->integer('honor');
            $table->integer('p3k');
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
        Schema::dropIfExists('sdm_diklats');
    }
};
