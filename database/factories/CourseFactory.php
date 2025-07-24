<?php

namespace Database\Factories;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'code' => strtoupper($this->faker->unique()->bothify('CSE###')),
            'name' => $this->faker->words(3, true),
            'department' => $this->faker->randomElement(['CSE', 'ECE', 'ME', 'CE', 'EEE']),
            'credits' => $this->faker->numberBetween(2, 6),
        ];
    }
}
