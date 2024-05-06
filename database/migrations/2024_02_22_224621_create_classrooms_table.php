<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    /* This PHP code snippet is a migration file using Laravel's Eloquent ORM for database schema
    management. */
    public function up(): void
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();

            $table->string('class_name')->unique();

            $table->timestamps();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');



            $table->foreignId('stage_id')->references('id')->on('stages')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('level_id')->references('id')->on('stage_levels')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};
