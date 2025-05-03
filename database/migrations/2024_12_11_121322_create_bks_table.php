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
        Schema::create('teknik_bks', function (Blueprint $table) {
            $table->id();
            $table->integer('jumSrvBk')->nullable(true);
            $table->integer('sendiriBk')->nullable(true);
            $table->integer('pihakTigaBk')->nullable(true);
            $table->string('bulanTahun')->nullable(true);
            $table->integer('dept')->nullable(true);
            $table->integer('user')->nullable(true);
            $table->integer('status')->nullable(true);
            $table->integer('update')->nullable(true);
            $table->integer('tabel')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teknik_bks');
    }
};
