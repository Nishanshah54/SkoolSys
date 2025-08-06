<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subject;

/**
 * @extends Factory<Subject>
 */
class SubjectFactory extends Factory
{
    protected $model = Subject::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Mathematics',
                'English',
                'Biology',
                'Chemistry',
                'Physics',
                'History',
                'Geography',
                'Computer Science',
                'Literature',
                'Art'
            ]),
        ];
    }
}
