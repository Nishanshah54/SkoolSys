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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Who performed it (null if guest)
            $table->string('actor_type'); // 'Admin', 'Student', 'Teacher', 'Parent'
            $table->string('action'); // 'added student', 'registered', etc.
            $table->string(column: 'target_type')->nullable(); // 'Student', 'Teacher', etc.
            $table->unsignedBigInteger('target_id')->nullable(); // ID of the affected record
            $table->enum('status', allowed: ['Active', 'Info', 'Warning', 'Error'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};