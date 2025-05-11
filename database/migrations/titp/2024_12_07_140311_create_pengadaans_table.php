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
        Schema::create('umum_pengadaans', function (Blueprint $table) {
            $table->id();
            $table->integer('beliLangsung')->nullable(true);
            $table->integer('adaLangsung')->nullable(true);
            $table->integer('kontrak')->nullable(true);
            $table->string('bulanTahun')->nullable(true);
            $table->string('dept')->nullable(true);
            $table->string('user')->nullable(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umum_pengadaans');
    }
};
