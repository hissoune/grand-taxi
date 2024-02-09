<?php

use App\Models\City;
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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('startcity_id')
                ->constrained('cities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        
            $table->foreignId('endcity_id')
                ->constrained('cities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->unique(['startcity_id', 'endcity_id']);
            $table->integer('distance');
            $table->time('duration');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
