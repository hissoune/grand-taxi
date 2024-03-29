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
        Schema::create('reservationns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('horaire_id')->constrained('horaires')->cascade('delete');
            $table->foreignId('users_id')->constrained('users')->cascade('delete');
            $table->boolean('cancelled')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservationns');
    }
};
