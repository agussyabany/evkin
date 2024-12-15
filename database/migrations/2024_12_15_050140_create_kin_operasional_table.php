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
        Schema::create('kin_operasional', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('VolProdRil')->nullable(true);
            $table->bigInteger('KpstsTrpsng')->nullable(true);
            $table->integer('KalkulasiJumAir')->nullable(true);
            $table->integer('JmlAirDist')->nullable(true);
            $table->integer('JmlWktPly')->nullable(true);
            $table->integer('Plgnlayan')->nullable(true);
            $table->integer('PlgnAktiv')->nullable(true);
            $table->integer('MtrAirGnti')->nullable(true);
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
        Schema::dropIfExists('kin_operasional');
    }
};
