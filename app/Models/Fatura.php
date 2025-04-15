<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fatura extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'idCliente',
        'totalLiquido',
        'iva',
        'total'
    ];

    protected $casts = [
        'data' => 'date',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }
}
