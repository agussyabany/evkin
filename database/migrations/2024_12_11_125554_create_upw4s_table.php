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
        Schema::create('pel_upw4s', function (Blueprint $table) {
            $table->id();
            $table->integer('tumbuhPlgn4')->nullable(true);
            $table->integer('plgnTahunLl4')->nullable(true);
            $table->integer('PermohonanSL4')->nullable(true);
            $table->integer('realisasi4')->nullable(true);
            $table->integer('permohonanTunda4')->nullable(true);
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
        Schema::dropIfExists('pel_upw4s');
    }
};
