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
        Schema::table('notifications', function (Blueprint $table) {
            // Add new fields after date_time
            $table->string('image')->nullable()->after('date_time');
            $table->string('notification_id')->nullable()->after('image'); // custom ID field

            // Remove sent_to column
            $table->dropColumn('sent_to');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifications', function (Blueprint $table) {
            // Revert changes
            $table->string('sent_to')->nullable(); // re-add if rollback
            $table->dropColumn(['image', 'notification_id']);
        });
    }
};
