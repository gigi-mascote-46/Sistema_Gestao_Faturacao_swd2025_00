<?php

namespace Database\Factories;

use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class FornecedorFactory extends Factory
{
    protected $model = Fornecedor::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'morada' => $this->faker->address,
            'email' => $this->faker->unique()->safeEmail,
            'telefone' => $this->faker->phoneNumber,
        ];
    }
}
