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
        Schema::create('gudang_permintaan_log', function (Blueprint $table) {
            $table->id();
            $table->integer('permintaan_id')->nullable(true);
            $table->string('status')->nullable(true);
            $table->integer('user_id')->nullable(true);
            $table->integer('id_ipa')->nullable(true);
            $table->integer('id_jabatan')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_log');
    }
};
