<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    // Definir explicitamente o nome da tabela
    protected $table = 'fornecedores'; // Certifique-se de que o nome está correto

    protected $fillable = [
        'nome',
        'email',
        'morada',
        'telefone',
    ];
}
