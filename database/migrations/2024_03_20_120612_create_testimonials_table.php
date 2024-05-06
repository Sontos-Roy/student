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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('degree_id')->nullable();
            $table->foreignId('program_id')->nullable();
            $table->string('first_enrollment')->nullable();
            $table->string('defense_semester')->nullable();
            $table->integer('supervisor_approve')->default(0);
            $table->foreignId('chairman_id')->nullable();
            $table->foreignId('dean_id')->nullable();
            $table->foreignId('department_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
