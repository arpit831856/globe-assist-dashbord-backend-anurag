<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partner_profiles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('partner_id');

            $table->string('business_name');
            $table->text('bio');

            $table->string('experience')->nullable();
            $table->string('projects_completed')->nullable();

            $table->string('service_areas')->nullable();
            $table->string('languages')->nullable();

            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->decimal('rating', 2, 1)->nullable();
            $table->string('reviews_count')->nullable();

            $table->text('skill_tags')->nullable();
            $table->string('profile_photo')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partner_profiles');
    }
};
