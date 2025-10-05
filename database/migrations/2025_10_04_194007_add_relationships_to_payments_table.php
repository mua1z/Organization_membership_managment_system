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
        Schema::table('payments', function (Blueprint $table) {
             if (!Schema::hasColumn('payments', 'user_id')) {
                $table->foreignId('user_id')->nullable()->after('id')->constrained()->onDelete('cascade');
            }

            if (!Schema::hasColumn('payments', 'plan_id')) {
                $table->foreignId('plan_id')->nullable()->after('user_id')->constrained()->onDelete('cascade');
            }

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
             if (Schema::hasColumn('payments', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }

            if (Schema::hasColumn('payments', 'plan_id')) {
                $table->dropForeign(['plan_id']);
                $table->dropColumn('plan_id');
            }
        });
    }
};
