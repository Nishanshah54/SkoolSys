<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create specific roles if needed
        User::factory()->count(2)->state(['role' => 'admin'])->create();
        User::factory()->count(5)->state(['role' => 'teacher'])->create();
        User::factory()->count(5)->state(['role' => 'parent'])->create();
        User::factory()->count(10)->state(['role' => 'student'])->create();
        User::factory()->count(3)->state(['role' => 'account'])->create();
    }
}
