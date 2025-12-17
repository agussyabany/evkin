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
        Schema::create('volt', function (Blueprint $table) {
            $table->id();
            $table->decimal('vol',6,2)->nullable(true);
            $table->integer('id_pompa')->nullable(true);
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
        Schema::dropIfExists('volt');
    }
};
