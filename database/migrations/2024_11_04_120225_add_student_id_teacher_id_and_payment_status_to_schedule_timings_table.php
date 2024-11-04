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
        Schema::table('schedule_timings', function (Blueprint $table) {
            Schema::table('schedule_timings', function (Blueprint $table) {
                $table->unsignedBigInteger('student_id')->nullable()->after('deleted_at');
                $table->unsignedBigInteger('teacher_id')->nullable()->after('student_id');
                $table->string('payment_status')->default('pending')->after('teacher_id');
                $table->foreign('student_id')->references('id')->on('users')->onDelete('set null');
                $table->foreign('teacher_id')->references('id')->on('users')->onDelete('set null');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedule_timings', function (Blueprint $table) {
            //
        });
    }
};
