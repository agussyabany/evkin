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
            $table->dropColumn('RealByDiklat');
            $table->dropColumn('RealByPeg');
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
