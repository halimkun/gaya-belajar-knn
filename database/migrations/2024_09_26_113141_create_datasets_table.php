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

            $table->string('nama')->default(null);
            $table->string('jk');
            $table->date('tgl_lahir');
            $table->string('jurusan');
            $table->string('kelas');
            $table->double('mtk');
            $table->double('pjok');
            $table->double('visual');
            $table->double('auditori');
            $table->double('kinestetik');
            $table->double('skor');

            $table->string('label')->nullable();

            $table->timestamps();
            $table->softDeletes();
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
