@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center mb-4">
            <img src="{{ asset('logo1-removebg-preview.png') }}" alt="Logo" style="height: 50px; margin-right: 15px;">
            <h1>Listagem de Faturas</h1>
        </div>


        {{-- search box and button --}}
        <div class="search-box">
            <form method="GET" action="{{ route('faturas.index') }}"
                class="mb-3 d-flex align-items-center gap-2 position-relative">
                <!-- Select de campo -->
                <select name="campo" class="form-select" style="max-width: 150px;">
                    <option value="text" {{ request('campo') == 'filtro' ? 'selected' : '' }}>Filtrar por...</option>
                    <option value="nome" {{ request('campo') == 'nome' ? 'selected' : '' }}>Cliente</option>
                    <option value="id" {{ request('campo') == 'id' ? 'selected' : '' }}>Numero</option>
                </select>

                <!-- Campo de pesquisa com ícone -->
                <div class="position-relative w-25">
                    <input type="text" name="search" class="form-control ps-5" placeholder="Pesquisar Cliente..."
                        value="{{ request('search') }}">
                    <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                </div>
                <button type="submit" class="btn btn-primary">Pesquisar</button>

                <a href="{{ route('faturas.create') }}"><button type="button" class="btn btn-primary">Novo
                        Cliente</button></a>
                <div class="d-flex justify-content-between">
                    <div class="btn-group">
                        <a href="?perPage=10"
                            class="btn btn-sm btn-outline-primary {{ request('perPage', 10) == 10 ? 'active' : '' }}">10</a>
                        <a href="?perPage=20"
                            class="btn btn-sm btn-outline-primary {{ request('perPage') == 20 ? 'active' : '' }}">20</a>
                        <a href="?perPage=30"
                            class="btn btn-sm btn-outline-primary {{ request('perPage') == 30 ? 'active' : '' }}">30</a>
                    </div>
                </div>
            </form>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Cliente</th>
                    <th>Data</th>
                    <th>Total Líquido</th>
                    <th>IVA</th>
                    <th>Total</th>
                    <th>Detalhes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faturas as $fatura)
                    <tr>
                        <td>{{ $fatura->id }}</td>
                        <td>{{ $fatura->cliente->nome }}</td>
                        <td>{{ $fatura->data ? $fatura->data->format('d/m/Y') : '' }}</td>
                        <td>{{ number_format($fatura->totalLiquido, 2, ',', ' ') }} €</td>
                        <td>{{ number_format($fatura->iva, 2, ',', ' ') }} €</td>
                        <td>{{ number_format($fatura->total, 2, ',', ' ') }} €</td>
                        <td>
                            <a href="{{ route('faturas.show', $fatura->id) }}" class="btn btn-info btn-sm">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection
