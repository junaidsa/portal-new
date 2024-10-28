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
        Schema::table('branches', function (Blueprint $table) {
            $table->json('level_id')->nullable()->after('branch'); // Storing level_id as JSON
            $table->decimal('registration_fee', 8, 2)->default(0)->after('level_id');
            $table->decimal('meterical_fee', 8, 2)->default(0)->after('registration_fee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('branches', function (Blueprint $table) {
            //
        });
    }
};
