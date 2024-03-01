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
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id('message_id');
            $table->string('content', 500);
            $table->string('sender_id', 9)->references('dni_FK')->on('users');
            $table->string('receiver_id', 9)->references('dni_FK')->on('users');
            $table->dateTime('creation_date');
            $table->dateTime('received_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes');
    }
};
