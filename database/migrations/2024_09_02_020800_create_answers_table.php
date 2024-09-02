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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained()->onDelete('cascade');
            $table->foreignId('learning_style_id')->constrained()->onDelete('cascade');
            $table->string('answer');
            $table->timestamps();
            $table->softDeletes();
        });

        // Add unique constraint to the question_id and learning_style_id columns
        Schema::table('answers', function (Blueprint $table) {
            $table->unique(['question_id', 'learning_style_id']);
        });

        // Add indexes and foreign keys to the question_id and learning_style_id columns
        Schema::table('answers', function (Blueprint $table) {
            $table->index('question_id');
            $table->index('learning_style_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
