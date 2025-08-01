<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         foreach (range(1, 12) as $i) {
            Grade::create(['name' => 'Class ' . $i]);
        }
    }
}
