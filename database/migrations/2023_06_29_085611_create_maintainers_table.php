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
        Schema::create('maintainers', function (Blueprint $table) {
            $table->unsignedBigInteger('comic_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('role', ['owner', 'maintainer'])->default('maintainer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintainers');
    }
};
