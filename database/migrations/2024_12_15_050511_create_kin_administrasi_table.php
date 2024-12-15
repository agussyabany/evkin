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
        Schema::create('kin_administrasi', function (Blueprint $table) {
            $table->id();
            $table->string('rjp',100)->nullable(true);
            $table->string('pos',100)->nullable(true);
            $table->string('rpkk',100)->nullable(true);
            $table->string('rkap',100)->nullable(true);
            $table->string('bulanTahun')->nullable(true);
            $table->integer('status')->nullable(true);
            $table->integer('user')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kin_administrasi');
    }
};
