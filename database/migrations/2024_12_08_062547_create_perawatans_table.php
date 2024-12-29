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
        Schema::create('teknik_perawatans', function (Blueprint $table) {
            $table->id();
            $table->integer('jumSrv')->nullable(true);
            $table->integer('sendiri')->nullable(true);
            $table->integer('pihakTiga')->nullable(true);
            $table->integer('div')->nullable(true);
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
        Schema::dropIfExists('teknik_perawatans');
    }
};
