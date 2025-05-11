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
        Schema::create('pel_kepatuhan4s', function (Blueprint $table) {
            $table->id();
            $table->integer('sLputus4')->nullable(true);
            $table->integer('buka4')->nullable(true);
            $table->integer('reaisasiTagih4')->nullable(true);
            $table->integer('target4')->nullable(true);
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
        Schema::dropIfExists('pel_kepatuhan4s');
    }
};
