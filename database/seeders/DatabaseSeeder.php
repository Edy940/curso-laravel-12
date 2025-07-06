<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      
        // Verificar se o usuário já existe
         if(!User::where('email', 'cesar@celke.com.br')->first()) {
            //Cadastrar o usuário
            User::create([
                'name' => 'Cesar',
                'email' => 'cesar@celke.com.br',
                'password' => '123456A#',
            ]);
        }
        // Se não existir ou encontrar o registro com o email , cadastra o usuario
        User::firstOrCreate(
            ['email' => 'Gabrielly@celke.com.br'],
            ['name' => 'Gabrielly', 'email' => 'Gabrielly@celke.com.br', 'password' => '123456A#']
        );

          
        User::firstOrCreate(
            ['email' => 'Kelly@celke.com.br'],
            ['name' => 'Kelly', 'email' => 'Kelly@celke.com.br', 'password' => '123456A#']
        );
          
        User::firstOrCreate(
            ['email' => 'Ferrucio@celke.com.br'],
            ['name' => 'Ferrucio', 'email' => 'Ferrucio@celke.com.br', 'password' => '123456A#']
        );
               
    }
    
}
