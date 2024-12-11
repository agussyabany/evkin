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
        Schema::create('pel_upw3s', function (Blueprint $table) {
            $table->id();
            $table->integer('tumbuhPlgn3')->nullable(true);
            $table->integer('plgnTahunLl3')->nullable(true);
            $table->integer('PermohonanSL3')->nullable(true);
            $table->integer('realisasi3')->nullable(true);
            $table->integer('permohonanTunda3')->nullable(true);
            $table->string('bulanTahun')->nullable(true);
            $table->integer('dept')->nullable(true);
            $table->integer('update')->nullable(true);
            $table->integer('status')->nullable(true);
            $table->integer('tabel')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pel_upw3s');
    }
};
