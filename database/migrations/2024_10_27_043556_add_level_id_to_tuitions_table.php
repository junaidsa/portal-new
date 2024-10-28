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
        Schema::table('tuitions', function (Blueprint $table) {
            $table->unsignedBigInteger('level_id')->nullable()->after('user_id');
                      // Adding foreign key constraint
                      $table->foreign('level_id')->references('id')->on('levels')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tuitions', function (Blueprint $table) {
            //
        });
    }
};
