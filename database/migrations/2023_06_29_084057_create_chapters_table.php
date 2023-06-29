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
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comic_id');
            $table->string('title');
            $table->string('episode');
            $table->text('description')->nullable();
            $table->unsignedInteger('order_column');
            $table->json('pages')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->string('thumb_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};
