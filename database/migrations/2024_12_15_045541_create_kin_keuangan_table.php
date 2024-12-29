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
        Schema::create('kin_keuangan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('labaStlPjk')->nullable(true);
            $table->bigInteger('jmlEkuitas')->nullable(true);
            $table->bigInteger('biayaOps')->nullable(true);
            $table->bigInteger('PndptnOps')->nullable(true);
            $table->bigInteger('kaStrkas')->nullable(true);
            $table->bigInteger('HutangLancar')->nullable(true);
            $table->bigInteger('JmlPnrmRekAir')->nullable(true);
            $table->bigInteger('jmlRekAir')->nullable(true);
            $table->bigInteger('TotalAktiva')->nullable(true);
            $table->bigInteger('TotalHutang')->nullable(true);
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
        Schema::dropIfExists('kin_keuangan');
    }
};
