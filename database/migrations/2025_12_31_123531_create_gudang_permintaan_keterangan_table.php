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
        Schema::create('gudang_permintaan_keterangan', function (Blueprint $table) {
            $table->id();
    $table->foreignId('permintaan_detail_id')
          ->constrained('gudang_permintaan_detail')
          ->cascadeOnDelete();

    $table->enum('sumber', ['gudang', 'ipa']);
    $table->enum('kondisi', ['sesuai', 'kurang', 'lebih']);

    $table->integer('qty')->nullable(); // jumlah real (jika beda)
    $table->text('keterangan')->nullable();

    $table->foreignId('user_id')->constrained('users');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gudang_permintaan_keterangan');
    }
};
