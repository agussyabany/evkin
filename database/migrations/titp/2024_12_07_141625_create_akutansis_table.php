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
        Schema::create('umum_akutansis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('labaStPjk')->nullable(true);
            $table->bigInteger('JmllEkuitas')->nullable(true);
            $table->bigInteger('biayaOpr')->nullable(true);
            $table->bigInteger('kasSetKas')->nullable(true);
            $table->bigInteger('HtgLancar')->nullable(true);
            $table->bigInteger('solvabilitas')->nullable(true);
            $table->bigInteger('ttlAktiva')->nullable(true);
            $table->bigInteger('ttlHutang')->nullable(true);
            $table->bigInteger('SaldoPiutang')->nullable(true);
            $table->bigInteger('labaBerjalan')->nullable(true);
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
        Schema::dropIfExists('umum_akutansis');
    }
};
