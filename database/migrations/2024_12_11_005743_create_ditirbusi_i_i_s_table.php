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
        Schema::create('ditirbusiDua', function (Blueprint $table) {
            $table->id();
            $table->integer('jmlWktPelDist2')->nullable(true);
            $table->integer('TekananAir2')->nullable(true);
            $table->integer('plg07bar2')->nullable(true);
            $table->integer('nrw2')->nullable(true);
            $table->integer('AirDist2')->nullable(true);
            $table->integer('airDRD2')->nullable(true);
            $table->integer('aduanBocor2')->nullable(true);
            $table->integer('aduanBocorSel2')->nullable(true);
            $table->string('bulanTahun')->nullable(true);
            $table->integer('dept')->nullable(true);
            $table->integer('user')->nullable(true);
            $table->integer('status')->nullable(true);
            $table->integer('update')->nullable(true);
            $table->integer('tabel')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ditirbusiDua');
    }
};
