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
        Schema::table('kin_operasional', function (Blueprint $table) {
            $table->float('VolProdRil',10,2)->change();
            $table->float('KpstsTrpsng',10,2)->change();  // Ganti tipe data di sini
            $table->float('JmlAirDist',10,2)->change();
            $table->float('airTerjual',10,2)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kin_operasional', function (Blueprint $table) {
            $table->integer('VolProdRil')->change();
            $table->integer('KpstsTrpsng')->change();  // Ganti tipe data di sini
            $table->integer('JmlAirDist')->change();
            $table->integer('airTerjual')->change();
        });
    }
};
