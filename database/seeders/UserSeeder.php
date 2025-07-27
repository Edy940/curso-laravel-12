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
        Try {
            if(!User::where('email', 'cesar@celke.com.br')->first()){
                User::create([
                    'name' => 'Cesar',
                    'email' => 'cesar@celke.com.br',
                    'password' => Hash::make('123456A#'),
                ]);
            }
             // Se não encontrar o usuário de teste, cria um novo
            if(App::environment() !== 'production'){
                User::firstOrCreate(
                    ['name' => 'kelly', 'email' => 'Kelly@celke.com.br'],
                    [
                        'email' => 'Kelly@celke.com.br',
                        'password' => Hash::make('123456A#')
                    ],
                );
            // Se não encontrar o usuário de teste, cria um novo
            }
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            echo "Error creating test user: " . $e->getMessage();
        }
    }
}
