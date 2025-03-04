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
    Schema::create('skills', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('skill');
        $table->enum('skill_type', ['Technical', 'Soft', 'Language', 'Other']);
        $table->enum('skill_level', ['Beginner', 'Intermediate', 'Advanced', 'Expert']);
        $table->boolean('use_on_CV')->default(true);
        $table->boolean('is_verified')->default(false);
        $table->dateTime('verified_date')->nullable();
        $table->foreignId('verifier_id')->nullable()->constrained('users')->nullOnDelete();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};