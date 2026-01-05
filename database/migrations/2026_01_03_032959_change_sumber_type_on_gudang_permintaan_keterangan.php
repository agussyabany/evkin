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
        Schema::table('gudang_permintaan_keterangan', function (Blueprint $table) {
            // hapus kolom integer
            $table->dropColumn('sumber');
        });

        Schema::table('gudang_permintaan_keterangan', function (Blueprint $table) {
        $table->integer('sumber')->nullable(true);
        });
    }

    public function down(): void
    {
        Schema::table('gudang_permintaan_keterangan', function (Blueprint $table) {
            $table->dropColumn('status');
        });

         Schema::table('gudang_permintaan_keterangan', function (Blueprint $table) {
         $table->integer('sumber')->nullable(true);
        });
    }
};
