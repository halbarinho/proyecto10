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
        Schema::create('actividad_estudiantes', function (Blueprint $table) {
            $table->string('dni_student_FK', 9);
            $table->dateTime('date_realization');
            $table->unsignedBigInteger('id_activity_FK');
            $table->timestamps();
            $table->foreign('dni_student_FK')->references('dni_FK')->on('estudiantes');
            $table->foreign('id_activity_FK')->references('activity_id')
                ->on('actividades')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividad_estudiantes');
    }
};
