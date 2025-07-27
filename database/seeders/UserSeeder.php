<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Exception;

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

            // Criar usuários extras em ambientes que não são produção
            if (App::environment() !== 'production') {
                User::firstOrCreate(
                    ['email' => 'kelly@celke.com.br'],
                    ['name' => 'Kelly', 'password' => Hash::make('123456A#')]
                );

                User::firstOrCreate(
                    ['email' => 'jessica@celke.com.br'],
                    ['name' => 'Jessica', 'password' => Hash::make('123456A#')]
                );

                User::firstOrCreate(
                    ['email' => 'gabrielly@celke.com.br'],
                    ['name' => 'Gabrielly', 'password' => Hash::make('123456A#')]
                );
            }
        } catch (Exception $e) {
            echo "Erro ao criar usuários: " . $e->getMessage();
        }
    }
}
