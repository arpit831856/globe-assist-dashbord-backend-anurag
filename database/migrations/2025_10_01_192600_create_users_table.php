<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('image')->nullable(); // store image path
        $table->string('name');
        $table->string('mobile')->unique();
        $table->string('email')->unique();
        $table->string('company')->nullable();
        $table->string('type')->nullable();   // Admin, Manager, etc.
        $table->string('location')->nullable();
        $table->string('country')->nullable();
        // $table->enum('status', ['Active', 'Inactive','Pending'])->default('Active');
        $table->date('joined_at')->nullable();
        $table->text('description')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');

    }
};
