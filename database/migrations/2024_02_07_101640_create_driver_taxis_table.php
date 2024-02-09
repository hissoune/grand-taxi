<?php

use App\Models\User;
use App\Models\route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('driver_taxis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('User_id')->constrained('users');
            $table->integer('number_seets');
            $table->string('typ_veicl');
            $table->integer('matricule');
            $table->enum('status', ['disponible', 'in trip', 'out of service'])->default('disponible');
            $table->integer('price');
            $table->enum('method_payment',['cart','espase']);
            $table->text('description');
            $table->softDeletes();
            $table->timestamps();
        });
    }
    // Schema::create('driver_horaire', function (Blueprint $table)  {
    //     $table->id();
    //     $table->foreignId('route')
    //     ->constrained('routes');
    //     $table->foreignId('driver_taxi')
    //     ->constrained('driver_taxis');
    //     $table->date('depart_time');
    //     $table->date('destination_time');
    //     $table->softDeletes();
    //     $table->timestamps();
    // });
    // Schema::create('reservations', function (Blueprint $table) {
    //     $table->id();
    //     $table->foreignId('User_id')->constrained('users');
    //     $table->foreignId('driver_route')
    //     ->constrained('driver_routes');
    //     $table->boolean('cancelled')->default(false);
    //     $table->timestamps();
    // });
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_taxis');
    }
};
