<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Add category_id as a foreign key from the categories table
            $table->unsignedBigInteger('category_id')->nullable()->after('tags');

            // Assuming you have a categories table, you can add the foreign key constraint
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop the foreign key first, then drop the column
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
