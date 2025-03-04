<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('volunteer', function (Blueprint $table) {
            $table->id();
            $table->string('organization');
            $table->string('role')->nullable();
            $table->string('cause')->nullable();
            $table->boolean('is_current')->default(false);
            $table->tinyInteger('start_month');
            $table->smallInteger('start_year');
            $table->tinyInteger('end_month')->nullable();
            $table->smallInteger('end_year')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->json('media')->nullable();
            $table->timestamp('date_created')->nullable()->useCurrent();
            $table->timestamp('date_updated')->nullable()->useCurrent()->useCurrentOnUpdate();
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verified_date')->nullable();
            $table->foreignId('verifier_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->boolean('add_to_cv')->default(false);
            
            $table->index('user_id');
            $table->index('verifier_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('volunteer');
    }
};
