<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('test', function (Blueprint $table) {
            $table->id();
            $table->string('test');
            $table->string('score')->nullable();
            $table->integer('test_month')->nullable();
            $table->integer('test_year')->nullable();
            $table->text('description')->nullable();
            $table->json('media')->nullable();
            $table->text('credential_url')->nullable();
            $table->timestamp('date_created')->useCurrent();
            $table->timestamp('date_updated')->useCurrent()->useCurrentOnUpdate();
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verified_date')->nullable();
            $table->foreignId('verifier_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->boolean('add_to_cv')->default(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('test');
    }
};
