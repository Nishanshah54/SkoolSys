<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password = null;

    /**
     * Keep track of already assigned students to avoid re-use.
     */
    protected static array $usedStudentIds = [];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $role = fake()->randomElement(['admin', 'teacher', 'student', 'parent', 'account']);

        $student = null;
        $studentId = null;
        $mobileNumber = null;

        if ($role === 'student') {
            // Select an unused student with a mobile number
            $student = Student::whereNotNull('mobile_number')
                ->whereNotIn('student_id', self::$usedStudentIds)
                ->inRandomOrder()
                ->first();

            if (!$student) {
                throw new \Exception('No available students with mobile numbers found. Please seed the students first.');
            }

            self::$usedStudentIds[] = $student->student_id;
            $studentId = $student->student_id;
            $mobileNumber = $student->mobile_number;
        }

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => self::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => $role,
            'student_id' => $studentId,
            'mobile_number' => $mobileNumber,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
