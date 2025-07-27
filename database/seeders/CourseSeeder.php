<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            ['name' => 'Curso de Laravel 10'],
            ['name' => 'Curso de Laravel 11'],
            ['name' => 'Curso de Laravel 13'],
        ];

        foreach ($courses as $course) {
            \App\Models\Course::create($course);
        }
    }
}
