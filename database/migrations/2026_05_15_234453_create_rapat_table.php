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
        Schema::create('rapat', function (Blueprint $table) {
            $table->id();

            // Judul rapat
            $table->string('title');

            // Deskripsi rapat
            $table->text('description')->nullable();

            // Tanggal rapat
            $table->date('date');

            // Jam mulai
            $table->time('start_time');

            // Jam selesai
            $table->time('end_time');

            // Relasi ruang rapat
            $table->foreignId('meeting_room_id')
                  ->constrained('meeting_rooms')
                  ->onDelete('cascade');

            // Relasi direktorat
            $table->integer('directorate_id');

            // User pembuat agenda
            $table->integer('id_user')->nullable();

            // Status agenda
            // scheduled, ongoing, finished, cancelled
            $table->enum('status', [
                'scheduled',
                'ongoing',
                'finished',
                'cancelled'
            ])->default('scheduled');

            // Approval status
            // pending, approved, rejected
            $table->enum('approval_status', [
                'pending',
                'approved',
                'rejected'
            ])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapat');
    }
};
