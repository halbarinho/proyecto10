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

            $table->id();
            $table->foreignId('activity_id')
                ->references('id')->on('activities')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('estudiante_id')
                ->references('user_id')->on('estudiantes')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('class_id')
                ->nullable()
                ->references('id')->on('classrooms')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->enum('status', ['pending', 'completed'])->default('pending');

            $table->enum('evaluated', ['pending', 'completed'])->default('pending');

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
