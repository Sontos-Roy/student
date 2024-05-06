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
        Schema::create('clearances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id')->nullable();
            $table->foreignId('department_id')->nullable();
            $table->foreignId('degree_id')->nullable();
            $table->foreignId('hall_id')->nullable();
            $table->string('internship_title')->nullable();
            $table->string('attach_no')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('program_id')->nullable();
            $table->enum('status', ['applied', 'pending', 'approved', 'rejected']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clearances');
    }
};
