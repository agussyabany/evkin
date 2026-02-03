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
        Schema::table('gudang_trx_keluar', function (Blueprint $table) {
            $table->renameColumn('id_masuk', 'id_keluar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('gudang_trx_keluar', function (Blueprint $table) {
            $table->renameColumn('id_keluar', 'id_masuk');
        });
    }
};
