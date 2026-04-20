<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partner_slots', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('partner_id');

            $table->string('day', 30);          // Monday
            $table->time('start_time');         // 10:00
            $table->time('end_time');           // 18:00

            $table->string('location', 150);    // Delhi
            $table->string('status', 20)->default('Free');

            $table->timestamps();

            $table->foreign('partner_id')
                  ->references('id')
                  ->on('partners')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partner_slots');
    }
};