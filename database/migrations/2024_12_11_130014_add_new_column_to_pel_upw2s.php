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
        Schema::table('pel_upw2s', function (Blueprint $table) {
            $table->string('bulanTahun')->nullable(true);
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
        Schema::table('pel_upw2s', function (Blueprint $table) {
            //
        });
    }
};
