<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    protected $model = Section::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'grade_id' => Grade::inRandomOrder()->first()->id ?? Grade::factory(), // Use existing grade or create one
            'name' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
        ];
    }
}