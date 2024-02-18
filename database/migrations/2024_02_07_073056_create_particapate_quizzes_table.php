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
        Schema::create('particapate_quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('participate_id');
            $table->string('exam_id');
            $table->string('student_id');
            $table->string('start_time');
            $table->string('end_time')->nullable();
            $table->enum('status', ['0', '1'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('particapate_quizzes');
    }
};
