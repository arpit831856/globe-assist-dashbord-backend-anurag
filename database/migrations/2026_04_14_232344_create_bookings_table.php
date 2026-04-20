<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('partner_id')->nullable();

            $table->string('booking_code',30)->unique();

            $table->string('name');
            $table->string('phone',20);
            $table->string('email')->nullable();

            $table->date('booking_date');
            $table->string('location');
            $table->decimal('budget',10,2)->nullable();

            $table->text('requirements')->nullable();

            $table->string('status',30)->default('Pending');
            $table->string('payment_status',20)->default('Unpaid');

            $table->timestamp('assigned_at')->nullable();
            $table->timestamp('completed_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};