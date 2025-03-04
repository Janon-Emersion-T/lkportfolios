<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('social', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('platform', ['Facebook', 'Twitter', 'LinkedIn', 'Instagram', 'YouTube', 'GitHub', 'Dribbble', 'Behance', 'Other']);
            $table->string('profile_url', 512);
            $table->boolean('is_verified')->default(false);
            $table->dateTime('verified_date')->nullable();
            $table->foreignId('verifier_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
            $table->boolean('add_to_cv')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social');
    }
};
