<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Fornecedor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(20)->create();

        Cliente::factory(20)->create();

        Fornecedor::factory(20)->create();

        // Only create admin user if it doesn't exist
        User::firstOrCreate(
            ['email' => 'fabi.jus@gmail.com'],
            [
                'name' => 'Fabi Nascimento',
                'level' => 'admin',
                'password' => bcrypt('password') // Set a default password
            ]
        );

        \App\Models\Fatura::factory(20)->create();
    }
}
