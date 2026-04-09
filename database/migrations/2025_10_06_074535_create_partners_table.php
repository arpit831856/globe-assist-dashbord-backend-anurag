<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('partners', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }
    public function up(): void
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable(); // Partner Photo
            $table->string('full_name');
            $table->string('mobile');
            $table->string('email')->unique();
            $table->string('location');
            $table->string('country');
            $table->enum('status', ['active', 'inactive', 'pending'])->default('active');
            $table->text('description')->nullable();

            // Document uploads
            $table->string('aadhar_card')->nullable();
            $table->string('pan_card')->nullable();
            $table->string('cv_resume')->nullable();
            $table->string('previous_work')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
