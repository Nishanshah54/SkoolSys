<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected static array $usedStudentIds = [];

    public function run(): void
    {
        // 🔹 Seed students
        Student::factory()->count(10)->create();

        // 🔹 Create Admin
        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@skoolsys.com',
            'role' => 'admin',
            'status' => true,
        ]);

        // 🔹 Create Teacher
        User::factory()->create([
            'name' => 'Test Teacher',
            'email' => 'teacher@skoolsys.com',
            'role' => 'teacher',
        ]);

        // 🔹 Create Student User
        $student = Student::whereNotNull('mobile_number')
            ->whereNotIn('student_id', self::$usedStudentIds)
            ->whereNotIn('mobile_number', User::pluck('mobile_number')->filter()->all())
            ->inRandomOrder()
            ->first();

        if (!$student) {
            throw new \Exception('No available student with a unique mobile_number found.');
        }

        self::$usedStudentIds[] = $student->student_id;

        User::factory()->create([
            'name' => 'Test Student',
            'email' => 'student@skoolsys.com',
            'role' => 'student',
            'student_id' => $student->student_id,
            'mobile_number' => $student->mobile_number,
        ]);

        // 🔹 Create Parent User
        $anotherStudent = Student::whereNotNull('mobile_number')
            ->whereNotIn('student_id', self::$usedStudentIds)
            ->whereNotIn('mobile_number', User::pluck('mobile_number')->filter()->all())
            ->inRandomOrder()
            ->first();

        if (!$anotherStudent) {
            throw new \Exception('No additional student with a unique mobile_number for the parent user.');
        }

        self::$usedStudentIds[] = $anotherStudent->student_id;

        User::factory()->create([
            'name' => 'Test Parent',
            'email' => 'parent@skoolsys.com',
            'role' => 'parent',
            'mobile_number' => $anotherStudent->mobile_number,
        ]);
    }
}