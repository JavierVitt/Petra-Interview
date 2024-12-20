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
        Schema::create('interviewers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')->constrained(
                table: 'divisions', indexName: 'interviewer_division_id'
            );
            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'interviewer_user_id'
            );
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('interviewers');
    }
};
