<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activities_results', function (Blueprint $table) {
            // $table->id('activity_id');

            $table->foreignId('activity_id')->references('id')->on('activities');
            $table->foreignId('estudiante_id')->references('user_id')->on('estudiantes');

            $table->primary(['activity_id', 'estudiante_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities_results');
    }
};
