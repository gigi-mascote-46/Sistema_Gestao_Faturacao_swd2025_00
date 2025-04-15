<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Fornecedor;

class FornecedoresTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Gerar 10 fornecedores fictícios
        for ($i = 0; $i < 10; $i++) {
            Fornecedor::create([
                'nome' => $faker->company,
                'email' => $faker->companyEmail,
                'telefone' => $faker->phoneNumber,
                'morada' => $faker->address,
            ]);
        }
    }
}
