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
        Schema::table('utama_perencanaanteks', function (Blueprint $table) {
            Schema::dropIfExists('utama_perencanaanteks'); // Ganti nama_tabel dengan nama tabel yang ingin dihapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Membuat ulang tabel jika diperlukan
        Schema::create('utama_perencTek', function (Blueprint $table) {
            $table->id();
            $table->integer('jmlRab')->nullable(true);
            $table->string('bulanTahun')->nullable(true);
            $table->timestamps();
        });
    }
};
