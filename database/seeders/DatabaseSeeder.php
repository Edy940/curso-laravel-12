<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeders para produção
        if (App::environment() === 'production') {
            $this->call([
                StatusSeeder::class,
                UserSeeder::class,
                CourseStatusSeeder::class,
            ]);
        }

        // Seeders para desenvolvimento/homologação
        if (App::environment() !== 'production') {
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

        // Garantir usuários básicos
        if (!User::where('email', 'cesar@celke.com.br')->first()) {
            User::create([
                'name' => 'Cesar',
                'email' => 'cesar@celke.com.br',
                'password' => '123456A#',
            ]);
        }

        User::firstOrCreate(
            ['email' => 'Gabrielly@celke.com.br'],
            ['name' => 'Gabrielly', 'password' => '123456A#']
        );

        User::firstOrCreate(
            ['email' => 'Kelly@celke.com.br'],
            ['name' => 'Kelly', 'password' => '123456A#']
        );

        User::firstOrCreate(
            ['email' => 'Ferrucio@celke.com.br'],
            ['name' => 'Ferrucio', 'password' => '123456A#']
        );
    }
}
