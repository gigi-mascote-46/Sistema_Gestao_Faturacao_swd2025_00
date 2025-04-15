@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Fatura #{{ $fatura->id }}</h1>
    <form action="{{ route('faturas.update', $fatura->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="idCliente" class="form-label">Cliente</label>
            <select class="form-select" id="idCliente" name="idCliente" required>
                @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ $fatura->idCliente == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->nome }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" class="form-control" id="data" name="data"
                   value="{{ $fatura->data->format('Y-m-d') }}" required>
        </div>
        <div class="mb-3">
            <label for="totalLiquido" class="form-label">Total Líquido (€)</label>
            <input type="number" step="0.01" class="form-control" id="totalLiquido"
                   name="totalLiquido" value="{{ $fatura->totalLiquido }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Fatura</button>
        <a href="{{ route('faturas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
