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
        Schema::table('gudang_stok_log', function (Blueprint $table) {
            $table->integer('masuk')
                ->default(0)
                ->after('awal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gudang_stok_log', function (Blueprint $table) {
             $table->dropColumn('masuk');
        });
    }
};
