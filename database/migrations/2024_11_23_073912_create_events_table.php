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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->text('event_description')->nullable();
            $table->date('recruitment_start_date');
            $table->date('recruitment_end_date');
            $table->string('event_scope')->nullable();
            $table->date('event_date')->nullable();
            $table->string('event_location')->nullable();
            $table->text('proposal')->nullable();
            $table->integer('number_of_committee_members');
            $table->integer('target_participants')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
