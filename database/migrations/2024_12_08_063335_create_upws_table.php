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
        Schema::create('pel_upws', function (Blueprint $table) {
            $table->id();
            $table->integer('tumbuhPlgn')->nullable(true);
            $table->integer('plgnTahunLl')->nullable(true);
            $table->integer('PermohonanSL')->nullable(true);
            $table->integer('realisasi')->nullable(true);
            $table->integer('permohonanTunda')->nullable(true);
            $table->integer('upw')->nullable(true);
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
        Schema::dropIfExists('pel_upws');
    }
};
