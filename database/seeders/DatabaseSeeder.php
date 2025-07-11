<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@skoolsys.com',
            'role'=>'admin'
        ]);
        User::factory()->create([
            'name' => 'Test Teacher',
            'email' => 'teacher@skoolsys.com',
            'role'=>'teacher'
        ]);
        User::factory()->create([
            'name' => 'Test student',
            'student_id' => 'skoolsys_1001',
            'role'=>'student'
        ]);
        User::factory()->create([
            'name' => 'Test parent',
            'mobile_number' => 'parent@skoolsys.com',
            'role'=>'parent'
        ]);

        $this->call([
            UserSeeder::class,
        ]);
    }
}