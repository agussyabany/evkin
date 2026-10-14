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
        Schema::create('gudang_stok_ipa_log', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_ipa');
            $table->unsignedBigInteger('id_bahan');

            // masuk, keluar, pembatalan
            $table->string('jenis', 20);

            // Saldo sebelum dan sesudah transaksi
            $table->decimal('awal', 15, 2)->default(0);
            $table->decimal('jumlah', 15, 2)->default(0);
            $table->decimal('akhir', 15, 2)->default(0);

            // Nomor transaksi keluar atau permintaan dari gudang utama
            $table->string('id_transaksi')->nullable();

            // ID petugas pada tabel users
            $table->unsignedBigInteger('user_id')->nullable();

            $table->timestamps();

            $table->index(['id_ipa', 'id_bahan', 'created_at']);
            $table->index('id_transaksi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gudang_stok_ipa_log');
    }
};
