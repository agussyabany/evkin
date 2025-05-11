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
        Schema::create('pel_rekenings', function (Blueprint $table) {
            $table->id();
            $table->integer('efesTag')->nullable(true);
            $table->bigInteger('drd')->nullable(true);
            $table->bigInteger('JmlAirDom')->nullable(true);
            $table->integer('PlgnDom')->nullable(true);
            $table->bigInteger('jmlAirTerjual')->nullable(true);
            $table->integer('efekTagih')->nullable(true);
            $table->bigInteger('terimaAir')->nullable(true);
            $table->bigInteger('jumRekAir')->nullable(true);
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
        Schema::dropIfExists('pel_rekenings');
    }
};
