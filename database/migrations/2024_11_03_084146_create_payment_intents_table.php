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
        Schema::create('payment_intents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')->constrained()->onDelete('cascade'); // References the schedule
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade'); // Assuming students are in the users table
            $table->string('stripe_payment_intent_id')->unique(); // Stores Stripe's payment intent ID
            $table->string('currency', 10)->default('mvr'); // Default currency set to MVR
            $table->integer('amount'); // Payment amount in cents
            $table->string('status')->default('pending'); // Payment status (e.g., succeeded, failed, pending)
            $table->json('metadata')->nullable(); // Optional metadata (e.g., student and subject info)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_intents');
    }
};
