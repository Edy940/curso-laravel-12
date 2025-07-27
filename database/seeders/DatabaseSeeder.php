<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed que deve ser executadas em produção
        if(App::environment() == 'production'){
            $this->call([
                StatusSeeder::class,
                UserSeeder::class,
                CourseStatusSeeder::class,
               
                ]);
        }

        // Seed que deve ser executadas se for diferente de produção
        if(App::environment() !== 'production'){
            $this->call([  
                StatusSeeder::class,
                UserSeeder::class,
                CourseStatusSeeder::class,    
                CourseBatchSeeder::class,
                CourseSeeder::class,
                ModuleSeeder::class,
                LessonSeeder::class,
                ]);
        }
    
    }
}
