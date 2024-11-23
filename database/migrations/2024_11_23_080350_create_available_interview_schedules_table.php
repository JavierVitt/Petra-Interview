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
            $table->dateTime('schedule');
            $table->foreignId('interviewer_id')->constrained(
                table: 'interviewers', indexName: 'available_interviewer_schedule_interviewer_id'
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
