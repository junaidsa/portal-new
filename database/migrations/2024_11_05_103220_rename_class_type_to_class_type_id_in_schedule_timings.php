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
            // Change `class_type_id` to unsignedBigInteger to match `class_types.id`
            $table->unsignedBigInteger('class_type_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedule_timings', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['class_type_id']);
            
            // Optionally, change it back to the original type if needed (e.g., string)
            $table->string('class_type_id')->change();
        });
    }
};

