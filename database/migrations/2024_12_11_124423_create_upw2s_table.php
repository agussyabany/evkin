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
        Schema::create('pel_upw2s', function (Blueprint $table) {
            $table->id();
            $table->integer('tumbuhPlgn2')->nullable(true);
            $table->integer('plgnTahunLl2')->nullable(true);
            $table->integer('PermohonanSL2')->nullable(true);
            $table->integer('realisasi2')->nullable(true);
            $table->integer('permohonanTunda2')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pel_upw2s'); 
    }
};
