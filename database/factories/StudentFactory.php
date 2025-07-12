<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => 'STU' . $this->faker->unique()->numerify('#####'),
            'name' => $this->faker->name(),
            'education' => $this->faker->randomElement(['primary', 'secondary', 'higher', 'bachelor']),
            'mobile_number' => $this->faker->unique()->optional()->numerify('09#########'),
        ];
    }
}
