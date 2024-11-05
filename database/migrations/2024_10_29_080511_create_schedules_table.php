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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->nullable(); 
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade')->nullable(); 
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade')->nullable(); 
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade')->nullable(); 
            $table->foreignId('level_id')->constrained('levels')->onDelete('cascade')->nullable(); 
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade')->nullable(); 
            $table->string('class_type')->nullable();
            $table->string('time_type')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('minute')->nullable();
            $table->integer('status')->default(1);
            $table->integer('payment_status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
