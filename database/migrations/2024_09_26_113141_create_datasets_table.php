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
        Schema::create('datasets', function (Blueprint $table) {
            $table->id();

            $table->string('nama')->default(null)->nullable();
            $table->string('jk')->default(null)->nullable();
            $table->date('tgl_lahir')->default(null)->nullable();
            $table->string('jurusan')->default(null)->nullable();
            $table->string('kelas')->default(null)->nullable();
            $table->double('mtk');
            $table->double('pjok');
            $table->double('visual');
            $table->double('auditori');
            $table->double('kinestetik');
            $table->double('skor');

            $table->string('label')->nullable()->default(null);

            $table->timestamps();
            $table->softDeletes();
        });

        // alter columns to assessments after user_id table to foreign key with datasets table
        Schema::table('assessments', function (Blueprint $table) {
            $table->foreignId('dataset_id')->after('user_id')->nullable()->default(null)->constrained()->onDelete('cascade');
            $table->text('raw_percentage')->after('dataset_id')->nullable()->default(null);
            $table->text('ai_recomendation')->after('raw_percentage')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datasets');
    }
};
