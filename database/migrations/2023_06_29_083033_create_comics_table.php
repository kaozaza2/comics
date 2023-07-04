<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['comic', 'manga']);
            $table->string('slug')->unique();
            $table->json('writers')->nullable();
            $table->json('artists')->nullable();
            $table->string('language')->nullable();
            $table->enum('age_rating', ['all_ages', 'teen_plus', 'teen', 'mature', 'explicit']);
            $table->timestamp('published_at')->nullable();
            $table->string('cover_path', 2048)->nullable();
            $table->string('thumb_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comics');
    }
};
