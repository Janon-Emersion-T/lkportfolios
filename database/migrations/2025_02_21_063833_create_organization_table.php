<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('organization', function (Blueprint $table) {
            $table->id();
            $table->string('organization');
            $table->string('position_held')->nullable();
            $table->boolean('membership_ongoing')->default(false);
            $table->tinyInteger('start_month');
            $table->smallInteger('start_year');
            $table->tinyInteger('end_month')->nullable();
            $table->smallInteger('end_year')->nullable();
            $table->text('description')->nullable();
            $table->json('media')->nullable();
            $table->timestamp('date_created')->useCurrent();
            $table->timestamp('date_updated')->useCurrent()->useCurrentOnUpdate();
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verified_date')->nullable();
            $table->foreignId('verifier_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->boolean('add_to_cv')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('organization');
    }
};
