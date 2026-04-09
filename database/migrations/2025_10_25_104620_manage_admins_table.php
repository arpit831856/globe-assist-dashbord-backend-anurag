<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('manage_admins', function (Blueprint $table) {
            $table->id();
            $table->string('sr_no')->nullable(); // Optional serial number (e.g. ADM001)
            $table->string('photo')->nullable(); // Profile image path
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->nullable(); // e.g. Super Admin, Manager, etc.
            $table->timestamp('last_login')->nullable();
            $table->enum('status', ['active', 'inactive', 'pending', 'suspended'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('manage_admins');
    }
};
