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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile_number')->nullable();
            $table->enum('gender',['male','female','others'])->default('others'); // 'male', 'female', etc.
            $table->date('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('qualification')->nullable(); // e.g. B.Ed, M.Sc, etc.
            $table->string('specialization')->nullable();
            $table->timestamps();
            $table->softDeletes(); // enables soft deletion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
