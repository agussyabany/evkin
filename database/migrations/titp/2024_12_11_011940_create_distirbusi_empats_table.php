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
        Schema::create('teknik_distirbusiEmpats', function (Blueprint $table) {
            $table->id();
            $table->integer('jmlWktPelDist4')->nullable(true);
            $table->integer('TekananAir4')->nullable(true);
            $table->integer('plg07bar4')->nullable(true);
            $table->integer('nrw4')->nullable(true);
            $table->integer('AirDist4')->nullable(true);
            $table->integer('airDRD4')->nullable(true);
            $table->integer('aduanBocor4')->nullable(true);
            $table->integer('aduanBocorSel4')->nullable(true);
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
        Schema::dropIfExists('teknik_distirbusiEmpats');
    }
};
