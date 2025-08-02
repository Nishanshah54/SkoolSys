<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\Section;
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

            // Use existing grade or create a new one
            'grade_id' => Grade::inRandomOrder()->first()?->id ?? Grade::factory(),

            // Use existing section or create one
            'section_id' => Section::inRandomOrder()->first()?->id ?? Section::factory(),
        ];
    }
}
