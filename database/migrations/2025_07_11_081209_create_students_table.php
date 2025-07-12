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
        Schema::create('students', function (Blueprint $table)
        {
                $table->string('student_id', 8)->primary(); // 8-character string primary key
                $table->string('name');
                $table->enum('education',['primary', 'secondary', 'higher', 'bachelor']);
                $table->string( 'mobile_number')->nullable()->index();
                // $table->string('email');
                $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
