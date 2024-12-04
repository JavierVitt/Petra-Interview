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
        Schema::create('available_interview_schedules', function (Blueprint $table) {
            $table->id();
            $table->date('interview_date')->nullable();
            $table->String('interview_time')->nullable();
            $table->foreignId('interviewer_id')->constrained(
                table: 'interviewers'
            );
            $table->foreignId('event_id')->constrained(
                table: 'events'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('available_interview_schedules');
    }
};
