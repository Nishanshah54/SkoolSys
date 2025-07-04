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
            $table->enum('role',['admin','teacher','student','parent','account'])->default('student')->index()->after('email');
            $table->string('mobile_number')->nullable()->unique()->after('role');
            $table->string('student_id')->nullable()->unique()->after('mobile_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
        $table->dropUnique(['mobile_number']);
         $table->dropUnique(['student_id']);
        $table->dropColumn(['mobile_number', 'student_id', 'role']);
        });
    }
};