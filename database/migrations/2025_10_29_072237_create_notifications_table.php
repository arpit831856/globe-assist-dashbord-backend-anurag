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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date_time')->nullable(); // Date & Time
            $table->string('sent_to')->nullable();       // e.g., Karigar, Customer, Admin
            $table->string('recipient_code')->nullable(); // e.g., KGR1201 - Rajesh
            $table->string('title')->nullable();          // Notification title
            $table->text('message')->nullable();          // Notification message body
            $table->string('type')->nullable();           // e.g., Order Update, Promotion
            $table->string('status')->default('Unread');  // e.g., Unread, Read, Sent
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
