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
        Schema::create('gudang_stok_ipa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_ipa')->constrained('ipas');
            $table->foreignId('id_bahan')->constrained('gudang_bahan');
            $table->integer('stok')->default(0);
            $table->timestamps();

            $table->unique(['id_ipa', 'id_bahan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gudang_stok_ipa');
    }
};
