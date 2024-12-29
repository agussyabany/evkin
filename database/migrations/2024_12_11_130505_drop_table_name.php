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
        Schema::dropIfExists('pel_upw3s');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Optionally, you can add the table creation logic here if you want to be able to reverse the drop
        Schema::create('pel_upw3s', function (Blueprint $table) {
            $table->id();
            // Add other columns that existed in the original table
            $table->timestamps();
        });
    }
};
