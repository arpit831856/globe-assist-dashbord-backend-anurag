<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partner_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->constrained('partners')->cascadeOnDelete();
            $table->foreignId('service_id')->constrained('services')->cascadeOnDelete();
            $table->string('category');
            $table->string('status')->default('pending');
            $table->string('title');
            $table->text('description');
            $table->string('price');
            $table->string('availability')->nullable();
            $table->string('location')->nullable();
            $table->unsignedInteger('experience_years')->nullable();
            $table->string('team_size')->nullable();
            $table->string('languages')->nullable();
            $table->text('highlights')->nullable();
            $table->json('photos')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partner_services');
    }
};
