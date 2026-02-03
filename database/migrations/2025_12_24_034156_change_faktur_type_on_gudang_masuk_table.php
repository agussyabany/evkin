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
        Schema::table('gudang_masuk', function (Blueprint $table) {
            // hapus kolom integer
            $table->dropColumn('faktur');
        });

        Schema::table('gudang_masuk', function (Blueprint $table) {
            // buat ulang sebagai DATE
            $table->string('faktur');
        });
    }

    public function down(): void
    {
        Schema::table('gudang_masuk', function (Blueprint $table) {
            $table->dropColumn('tgl_faktur');
        });

        Schema::table('gudang_masuk', function (Blueprint $table) {
            $table->integer('tgl_faktur');
        });
    }
};
