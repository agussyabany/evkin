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
            $table->renameColumn('id_ipa', 'tgl_faktur');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tgl_faktur_on_gudang_masuk', function (Blueprint $table) {
            $table->renameColumn('tgl_faktur','id_ipa' );
        });
    }
};
