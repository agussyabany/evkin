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
        Schema::create('gudang_stok_ipa_setting', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_ipa');
            $table->unsignedBigInteger('id_bahan');

            $table->decimal('stok_minimum', 15, 2)->default(0);

            $table->timestamps();

            $table->unique(
                ['id_ipa', 'id_bahan'],
                'gudang_stok_ipa_setting_ipa_bahan_unique'
            );

            $table->index('id_ipa');
            $table->index('id_bahan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gudang_stok_ipa_setting');
    }
};
