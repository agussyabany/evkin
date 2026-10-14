<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            ALTER TABLE gudang_ipatrx_keluar
            ALTER COLUMN id_transaksi TYPE VARCHAR(100)
            USING id_transaksi::VARCHAR(100)
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("
            ALTER TABLE gudang_ipatrx_keluar
            ALTER COLUMN id_transaksi TYPE INTEGER
            USING id_transaksi::INTEGER
        ");
    }
};
