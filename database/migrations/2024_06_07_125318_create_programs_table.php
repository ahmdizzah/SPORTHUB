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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id')->nullable(false);
            $table->foreign('plan_id')->references('id')->on('plans');
            $table->unsignedBigInteger('exercise_id')->nullable(false);
            $table->foreign('exercise_id')->references('id')->on('exercises');
            $table->integer('sets')->nullable(false);
            $table->integer('reps')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
