
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
        Schema::create('stok_opname_ipa', function (Blueprint $table) {
            $table->id();
            $table->string('no_opname', 50)->unique();
            $table->unsignedBigInteger('id_ipa');
            $table->date('periode');
            $table->dateTime('tanggal_opname');
            $table->unsignedBigInteger('user_id');
            $table->text('catatan')->nullable();
            $table->dateTime('posted_at');
            $table->timestamps();

            // Satu opname per IPA per bulan
            $table->unique(['id_ipa', 'periode']);
        });

        Schema::create('stok_opname_ipa_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stok_opname_id');
            $table->unsignedBigInteger('id_bahan');
            $table->decimal('stok_sistem', 15, 2)->default(0);
            $table->decimal('stok_fisik', 15, 2);
            $table->decimal('selisih', 15, 2)->default(0);
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('stok_opname_id')
                ->references('id')
                ->on('stok_opname_ipa')
                ->onDelete('cascade');

            $table->unique(['stok_opname_id', 'id_bahan']);
        });

        Schema::create('stok_opname_ipa_koreksi', function (Blueprint $table) {
            $table->id();
            $table->string('no_koreksi', 50)->unique();
            $table->unsignedBigInteger('stok_opname_id');
            $table->unsignedBigInteger('id_ipa');
            $table->unsignedBigInteger('id_bahan');
            $table->decimal('stok_sebelum', 15, 2);
            $table->decimal('jumlah_koreksi', 15, 2);
            $table->decimal('stok_sesudah', 15, 2);
            $table->text('alasan');
            $table->unsignedBigInteger('user_id');
            $table->dateTime('posted_at');
            $table->timestamps();

            $table->foreign('stok_opname_id')
                ->references('id')
                ->on('stok_opname_ipa')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_opname_ipa_koreksi');
        Schema::dropIfExists('stok_opname_ipa_detail');
        Schema::dropIfExists('stok_opname_ipa');
    }
};
