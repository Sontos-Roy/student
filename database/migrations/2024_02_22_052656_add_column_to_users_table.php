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
        Schema::table('users', function (Blueprint $table) {
            $table->string('session')->after('phone')->nullable();
            $table->string('father_name')->nullable()->after('phone');
            $table->string('mother_name')->nullable()->after('father_name');
            $table->string('address')->nullable()->after('mother_name');
            $table->date('dob')->nullable()->after('address');
            $table->date('nationality')->nullable()->after('dob');
            $table->date('gender')->nullable()->after('nationality');
            $table->date('signature')->nullable()->after('gender');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
