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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
             $table->string('name'); // Basic, Pro, Enterprise
            $table->decimal('price', 8, 2)->default(0); // e.g. 25.00, 50.00
            $table->enum('billing_cycle', ['free', 'monthly', 'yearly'])->default('free');
            $table->enum('type', ['organAdmin', 'member']);

            // For organizations
            $table->integer('max_members')->nullable();

            // For members
            $table->integer('duration_days')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
