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
        Schema::create('teknik_distribusis', function (Blueprint $table) {
            $table->id();
            $table->integer('jmlWktPelDist')->nullable(true);
            $table->integer('TekananAir')->nullable(true);
            $table->integer('plg07bar')->nullable(true);
            $table->integer('nrw')->nullable(true);
            $table->integer('AirDist')->nullable(true);
            $table->integer('airDRD')->nullable(true);
            $table->integer('aduanBocor')->nullable(true);
            $table->integer('aduabBocorSel')->nullable(true);
            $table->integer('wil')->nullable(true);
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
        Schema::dropIfExists('teknik_distribusis');
    }
};
