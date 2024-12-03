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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('status')->default('Menunggu Interview');
            $table->foreignId('recruitment_id')->constrained(
                table: 'recruitments', indexName: 'registration_recruitment_id'
            );
            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'registration_user_id'
            );
            $table->string('khs',255)->nullable();
            $table->string('skkk',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
