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
        Schema::create('provisional_certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('degree_id')->nullable();
            $table->foreignId('program_id')->nullable();
            $table->string('first_enrollment')->nullable();
            $table->string('defense_semester')->nullable();
            $table->string('dissertation_title')->nullable();
            $table->integer('supervisor_approve')->default(0)->nullable();
            $table->foreignId('chairman_id')->nullable();
            $table->foreignId('dean_id')->nullable();
            $table->foreignId('department_id')->nullable();
            $table->foreignId('supervisor_id')->nullable();
            $table->integer('chairman_approve')->nullable()->default(0);
            $table->integer('dean_approve')->nullable()->default(0);
            $table->string('exam_date')->nullable();
            $table->date('date_pub_compiled_result')->nullable();
            $table->string('cgpa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provisional_certificates');
    }
};
