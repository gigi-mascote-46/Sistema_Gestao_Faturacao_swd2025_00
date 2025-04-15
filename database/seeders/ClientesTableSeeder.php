<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        // Gerar 50 clientes fictícios
        \App\Models\Cliente::factory(50)->create();
    }
}
