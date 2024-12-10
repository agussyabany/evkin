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
        Schema::table('pel_rekenings', function (Blueprint $table) {
            $table->integer('status')->nullable(true);
            $table->integer('update')->nullable(true);
            $table->integer('tabel')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pel_rekenings', function (Blueprint $table) {
            //
        });
    }
};
