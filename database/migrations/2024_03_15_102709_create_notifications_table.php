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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('message')->nullable()->default('No hay mensaje establecido.');
            $table->enum('type', ['chat', 'activity', 'alerta']);
            $table->boolean('read')->default(false);
            $table->foreignId('user_id')->references('id')->on('users');
            $table->bigInteger('target_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
