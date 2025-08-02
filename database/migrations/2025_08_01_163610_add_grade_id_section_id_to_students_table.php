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
        Schema::table('students', function (Blueprint $table) {
            $table->foreignId('grade_id')->constrained();
            $table->foreignId(column: 'section_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
             $table->dropForeign(['grade_id']);
            $table->dropForeign(['section_id']);
            $table->dropColumn(['grade_id', 'section_id']);
        });
    }
};
