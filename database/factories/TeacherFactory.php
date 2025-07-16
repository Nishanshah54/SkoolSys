<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'gender' => fake()->randomElement(['male', 'female']),
            'dob' => fake()->date('Y-m-d', '2001-01-01'),
            'address' => fake()->address(),
            'qualification' => fake()->randomElement(['B.Ed', 'M.Ed', 'M.Sc', 'Ph.D']),
            'specialization' => fake()->randomElement(['Mathematics', 'Science', 'English', 'History']),
        ];
    }
}