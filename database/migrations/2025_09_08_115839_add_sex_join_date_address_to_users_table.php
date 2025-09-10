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
        Schema::table('users', function (Blueprint $table) {
            //

               $table->enum('sex', ['male', 'female', 'other'])->nullable()->after('email');
            $table->date('join_date')->nullable()->after('sex');
            $table->string('address')->nullable()->after('join_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {



                $table->dropColumn(['sex', 'join_date', 'address']);
            //
        });
    }
};
