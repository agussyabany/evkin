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
        Schema::create('ipas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ipa')->nullable(true);
            $table->string('alamat')->nullable(true);
            $table->integer('pompa')->nullable(true);
            $table->integer('jalur')->nullable(true);
            $table->integer('reservoar')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ipas');
    }
};
