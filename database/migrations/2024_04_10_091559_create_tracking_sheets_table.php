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
        Schema::create('tracking_sheets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('user_id')->on('estudiantes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->text('observations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracking_sheets');
    }
};
