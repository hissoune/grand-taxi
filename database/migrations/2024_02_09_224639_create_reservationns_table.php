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
            $table->foreignId('horairand_driver')->constrained('driver_taxi_horaires');
            $table->foreignId('users_id')->constrained('users');
            $table->boolean('cancelled')->default(false);
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
