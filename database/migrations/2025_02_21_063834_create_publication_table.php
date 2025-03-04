<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('publication', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('publication_month')->nullable();
            $table->integer('publication_year')->nullable();
            $table->string('publisher')->nullable();
            $table->text('contributors')->nullable();
            $table->text('description')->nullable();
            $table->string('publication_url')->nullable();
            $table->json('media')->nullable();
            $table->timestamps();
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verified_date')->nullable();
            $table->foreignId('verifier_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->boolean('add_to_cv')->default(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('publication');
    }
};
