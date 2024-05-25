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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            $table->text('img_url')->nullable();
            $table->boolean('active')->default(true);
            $table->foreignId('category_id')
                ->nullable()
                ->references('id')->on('categories')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('user_id')
                ->nullable()
                ->references('id')->on('users')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
