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
        Schema::table('gudang_stok_ipa_log', function (Blueprint $table) {
        $table->string('referensi_tipe', 30)->nullable();
        $table->text('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gudang_stok_ipa_log', function (Blueprint $table) {
            //
        });
    }
};
