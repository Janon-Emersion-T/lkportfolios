<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->tinyInteger('start_month');
            $table->smallInteger('start_year');
            $table->tinyInteger('end_month')->nullable();
            $table->smallInteger('end_year')->nullable();
            $table->boolean('is_current')->default(0);
            $table->text('description')->nullable();
            $table->json('media')->nullable();
            $table->text('contributors')->nullable();
            $table->timestamps();
            $table->boolean('is_verified')->default(0);
            $table->timestamp('verified_date')->nullable();
            $table->foreignId('verifier_id')->nullable()->constrained('users')->onDelete('set null');
            $table->boolean('add_to_cv')->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project');
    }
};