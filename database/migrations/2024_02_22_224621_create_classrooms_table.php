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
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('class_id');
            $table->string('class_name')->unique();

            $table->timestamps();
            // $table->primary('class_id');
            // $table->unsignedBigInteger('user_id')->nullable();
            // $table->foreign('user_id')->references('user_id')->on('docentes')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');

            $table->foreignId('user_id')->references('user_id')->on('docentes')
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
