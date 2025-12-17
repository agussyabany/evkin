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
        Schema::create('ph_resv', function (Blueprint $table) {
            $table->id();
            $table->decimal('ph',6,2)->nullable(true);
            $table->integer('id_resv')->nullable(true);
            $table->integer('id_ipa')->nullable(true);
            $table->integer('id_user')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ph_resv');
    }
};
