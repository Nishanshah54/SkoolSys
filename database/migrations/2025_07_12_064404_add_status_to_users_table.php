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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('status')->default(true);
           $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->foreign('mobile_number')->references('mobile_number')->on('students')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['mobile_number']);

            $table->dropColumn([ 'status']);

        });
    }
};