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
        Schema::table('kin_sdm', function (Blueprint $table) {
            $table->bigInteger('RealByDiklat')->nullable(true);
            $table->bigInteger('RealByPeg')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kin_sdm', function (Blueprint $table) {
            //
        });
    }
};
