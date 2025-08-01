<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grade;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        // For each grade, create 2–3 sections (A, B, C)
        $sectionNames = ['A', 'B', 'C'];

        Grade::all()->each(function ($grade) use ($sectionNames) {
            foreach ($sectionNames as $name) {
                Section::create([
                    'grade_id' => $grade->id,
                    'name' => $name,
                ]);
            }
        });

        // Or generate random ones:
        // Section::factory()->count(30)->create();
    }
}
