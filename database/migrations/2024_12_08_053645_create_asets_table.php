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
        Schema::create('umum_asets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('totalAset')->nullable(true);
            $table->bigInteger('realAsetTtp')->nullable(true);
            $table->integer('serahKelola')->nullable(true);
            $table->integer('serahTerima');
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
        Schema::dropIfExists('umum_asets');
    }
};
