@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Fatura #{{ $fatura->id }}</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Cliente:</strong> {{ $fatura->cliente->nome }}</p>
            <p><strong>Data:</strong> {{ $fatura->data->format('d/m/Y') }}</p>
            <p><strong>Total Líquido:</strong> {{ number_format($fatura->totalLiquido, 2, ',', ' ') }} €</p>
            <p><strong>IVA (23%):</strong> {{ number_format($fatura->iva, 2, ',', ' ') }} €</p>
            <p><strong>Total:</strong> {{ number_format($fatura->total, 2, ',', ' ') }} €</p>
            <a href="{{ route('faturas.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</div>
@endsection
