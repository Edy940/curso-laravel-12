<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            // Usuário principal
            if (!User::where('email', 'cesar@celke.com.br')->first()) {
                User::create([
                    'name' => 'Cesar',
                    'email' => 'cesar@celke.com.br',
                    'password' => Hash::make('123456A#'),
                ]);
            }

            // Criar usuário de teste em ambientes não produtivos
            if (App::environment() !== 'production') {
                User::firstOrCreate(
                    ['email' => 'Kelly@celke.com.br'],
                    [
                        'name' => 'Kelly',
                        'password' => Hash::make('123456A#'),
                    ]
                );
            }
        } catch (\Exception $e) {
            echo "Error creating test user: " . $e->getMessage();
        }
    }
}
