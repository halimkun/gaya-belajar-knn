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
        Schema::create('assessment_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_id')->constrained()->onDelete('cascade');
            $table->foreignId('question_id')->constrained()->onDelete('cascade');
            $table->foreignId('answer_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('answer')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('assessment_answers', function (Blueprint $table) {
            $table->unique(['assessment_id', 'question_id']);
        });

        Schema::table('assessment_answers', function (Blueprint $table) {
            $table->index('assessment_id');
            $table->index('question_id');
            $table->index('answer_id');
        });

        // Schema::table('assessment_answers', function (Blueprint $table) {
        //     $table->foreign('assessment_id')->references('id')->on('assessments')->onDelete('cascade');
        //     $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        //     $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment_answers');
    }
};
