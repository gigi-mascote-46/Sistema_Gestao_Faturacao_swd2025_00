@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container">
    <h1>Nova Fatura</h1>

    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Sucesso!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = "{{ route('faturas.index') }}";
            });
        </script>
    @endif

    <form action="{{ route('faturas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="idCliente" class="form-label">Cliente</label>
            <select class="form-select @error('idCliente') is-invalid @enderror"
                    id="idCliente" name="idCliente" required>
                @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ old('idCliente') == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->nome }}
                </option>
                @endforeach
            </select>
            @error('idCliente')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" class="form-control @error('data') is-invalid @enderror"
                   id="data" name="data" value="{{ old('data') }}" required>
            @error('data')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="totalLiquido" class="form-label">Total Líquido (€)</label>
            <input type="number" step="0.01" class="form-control @error('totalLiquido') is-invalid @enderror"
                   id="totalLiquido" name="totalLiquido" value="{{ old('totalLiquido') }}" required>
            @error('totalLiquido')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="iva" class="form-label">IVA (%)</label>
            <input type="number" step="0.01" class="form-control @error('iva') is-invalid @enderror"
                   id="iva" name="iva" value="{{ old('iva') }}" required>
            @error('iva')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">Total com IVA (€)</label>
            <input type="number" step="0.01" class="form-control @error('total') is-invalid @enderror"
                   id="total" name="total" value="{{ old('total') }}" required>
            @error('total')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary">Criar Fatura</button>
            <a href="{{ route('faturas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
