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
        Schema::create('answers', function (Blueprint $table) {
            // $table->id();
            $table->foreignId('student_id')->references('user_id')->on('estudiantes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('question_id')->references('id')->on('questions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('activity_id')->references('id')->on('activities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->primary(['student_id', 'question_id']);
            $table->text('answer_text')->nullable();
            $table->boolean('answer_bool')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
