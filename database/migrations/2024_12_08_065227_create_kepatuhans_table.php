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
        Schema::create('pel_kepatuhans', function (Blueprint $table) {
            $table->id();
            $table->integer('sLputus')->nullable(true);
            $table->integer('buka')->nullable(true);
            $table->integer('realisasiTagih')->nullable(true);
            $table->integer('target')->nullable(true);
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
        Schema::dropIfExists('pel_kepatuhans');
    }
};
