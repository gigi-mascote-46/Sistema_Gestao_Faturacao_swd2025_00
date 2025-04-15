<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Fatura;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaturaFactory extends Factory
{
    protected $model = Fatura::class;

    public function definition()
    {
        $subtotal = $this->faker->randomFloat(2, 50, 2000);
        $iva = $subtotal * 0.23; // 23% IVA
        $total = $subtotal + $iva;

        return [
            'data' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'idCliente' => Cliente::inRandomOrder()->first()->id,
            'totalLiquido' => $subtotal,
            'iva' => $iva,
            'total' => $total,
        ];
    }
}
