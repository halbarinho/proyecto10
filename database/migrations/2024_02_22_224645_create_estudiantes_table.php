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
        Schema::create('estudiantes', function (Blueprint $table) {
            //lo sustituyo al usar el metodo foreignId
            // $table->unsignedBigInteger('user_id');
            //pruebo a eliminarla
            // $table->string('dni_FK', 9)->unique();
            $table->date('date_of_birth')->nullable();
            $table->text('history')->nullable();
            $table->timestamps();


            //lo sustituyo al usar el metodo foreignId
            // $table->primary('user_id');
            // $table->foreign('user_id')->references('id')->on('users')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');

            $table->foreignId('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->primary('user_id');

            // $table->unsignedBigInteger('class_id')->nullable();
            // $table->foreign('class_id')->references('id')->on('classrooms')
            //     ->nullOnDelete()
            //     ->onUpdate('cascade');

            $table->foreignId('class_id')
                ->nullable()
                ->constrained(table: 'classrooms', indexName: 'id')
                ->nullOnDelete()
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
