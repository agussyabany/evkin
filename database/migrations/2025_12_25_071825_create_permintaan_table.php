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
        Schema::create('gudang_permintaan', function (Blueprint $table) {
            $table->id();
            $table->string('no_permintaan')->unique();
            $table->foreignId('id_ipa')->constrained('ipas');
            $table->foreignId('user_id')->constrained('users');

            $table->enum('status', [
                'draft',
                'diajukan',
                'disetujui_asmen_ipa',
                'disetujui_asmen_gudang',
                'dimuat',
                'dikirim',
                'diterima'
            ])->default('draft');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gudang_permintaan');
    }
};
