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
        // USERS TABLE
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user')->after('email');
            $table->string('password')->nullable()->after('role');
        });

        // PARTNERS TABLE
        Schema::table('partners', function (Blueprint $table) {
            $table->string('role')->default('partner')->after('email');
            $table->string('password')->nullable()->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
     public function down(): void
    {
        // USERS TABLE
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'password']);
        });

        // PARTNERS TABLE
        Schema::table('partners', function (Blueprint $table) {
            $table->dropColumn(['role', 'password']);
        });
    }
};
