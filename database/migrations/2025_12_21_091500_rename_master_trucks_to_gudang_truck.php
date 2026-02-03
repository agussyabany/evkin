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
         Schema::rename('master_trucks', 'gudang_truck');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('gudang_truck', 'master_truck');
    }
};
