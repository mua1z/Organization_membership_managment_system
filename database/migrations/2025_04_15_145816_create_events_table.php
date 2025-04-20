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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            
        $table->string('title');
        $table->enum('type', ['meeting', 'workshop', 'social', 'fundraiser', 'conference']);
        $table->text('description')->nullable();

        $table->date('start_date');
        $table->time('start_time');
        $table->date('end_date')->nullable();
        $table->time('end_time')->nullable();

        $table->string('location')->nullable();
        $table->string('organ_name')->nullable();
        $table->unsignedInteger('capacity')->nullable();

        $table->date('rsvp_deadline')->nullable();

        $table->enum('status', ['draft', 'upcoming', 'published'])->default('draft');

        $table->string('image')->nullable();
       
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
