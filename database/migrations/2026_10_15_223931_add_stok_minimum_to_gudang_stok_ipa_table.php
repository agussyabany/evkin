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
        Schema::table('gudang_stok_ipa', function (Blueprint $table) {
            $table->decimal('stok_minimum', 15, 2)
                ->default(0)
                ->after('stok');
        });
    }

    /**
     * Reverse the migrations.
     */
     public function down(): void
    {
        Schema::table('gudang_stok_ipa', function (Blueprint $table) {
            $table->dropColumn('stok_minimum');
        });
    }
};
