<?php

namespace Database\Factories;

use App\Models\Schedule;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    protected $model = Schedule::class;

    public function definition(): array
    {
        // Start times and days
        $startTimes = ['08:00', '09:00', '10:00', '11:00', '13:00', '14:00'];
        $start = $this->faker->randomElement($startTimes);
        $end = date('H:i', strtotime($start) + 3600);

        return [
            'grade_id' => Grade::inRandomOrder()->value('id') ??Grade::factory(),

            // Try to get existing subject or create one
            'subject_id' => Subject::inRandomOrder()->value('id') ?? Subject::factory(),

            // Try to get existing teacher or create one
            'teacher_id' => Teacher::inRandomOrder()->value('id') ?? Teacher::factory(),

            'day_of_week' => $this->faker->randomElement([
                'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'
            ]),
            'start_time' => $start,
            'end_time' => $end,
        ];
    }
}