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
        Schema::create('alertas', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(false);
            $table->foreignId('estudiante_id')->nullable()
                ->references('user_id')->on('estudiantes')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('class_id')->nullable()
                ->references('id')->on('classrooms')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->string('content', 500);
            $table->timestamp('creation_date');
            $table->timestamp('reception_date')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alertas');
    }
};
