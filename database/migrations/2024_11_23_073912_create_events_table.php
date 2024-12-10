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
            $table->id()->autoIncrement();
            $table->foreignId('chairman_id')->constrained(table:'users')->onDelete('cascade');
            $table->string('event_name')->nullable();
            $table->string('event_description', 255)->nullable();
            $table->date('recruitment_start_date')->nullable();
            $table->date('recruitment_end_date')->nullable();
            $table->string('event_scope',255)->nullable();
            $table->date('event_date')->nullable();
            $table->string('event_location',255)->nullable();
            $table->string('proposal',255)->nullable();
            $table->string('raRma',255)->nullable();
            $table->bigInteger('status')->default(0);
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
