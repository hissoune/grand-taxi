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
        Schema::create('driver_taxi_horaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('horaire_id')->constrained('horaires');
            $table->foreignId('driver_taxi_id')->constrained('driver_taxis');
            
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horaire_driverns');
    }
};
