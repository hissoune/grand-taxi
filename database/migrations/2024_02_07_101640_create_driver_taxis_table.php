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
            $table->foreignId('User_id')->constrained('users')->cascade('delete');
            $table->unique('User_id');
            $table->enum('status', ['disponible', 'in trip', 'out of service'])->default('out of service');
            $table->integer('number_seets');
            $table->string('image');
            $table->string('typ_veicl');
            $table->integer('matricule');
            $table->enum('method_payment',['cart','espase']);
            $table->text('description');
            $table->softDeletes();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_taxis');
    }
};
