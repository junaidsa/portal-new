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
            //
            $table->unsignedBigInteger('branch_id')->nullable()->after('schedule_time'); // Add after the appropriate column if needed
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
