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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id('id_FK');
            $table->string('dni_FK', 9)->unique();
            $table->string('speciality', 50);
            $table->timestamps();
            $table->foreign('id_FK')->references('id')->on('users');
            $table->foreign('dni_FK')->references('dni')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docentes');
    }
};
