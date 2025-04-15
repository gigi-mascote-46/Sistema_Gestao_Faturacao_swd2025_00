@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- {{ __('Listagem de Clientes') }} --}}




        <div class="d-flex align-items-center mb-4">
            <img src="{{ asset('logo1-removebg-preview.png') }}" alt="Logo" style="height: 50px; margin-right: 15px;">
            <h1>Listagem de Clientes</h1>
        </div>


        {{-- search box and button --}}
        <div class="search-box">
            <form method="GET" action="{{ route('clientes.index') }}"
                class="mb-3 d-flex align-items-center gap-2 position-relative">
                <!-- Select de campo -->
                <select name="campo" class="form-select" style="max-width: 150px;">
                    <option value="text" {{ request('campo') == 'filtro' ? 'selected' : '' }}>Filtrar por...</option>
                    <option value="nome" {{ request('campo') == 'nome' ? 'selected' : '' }}>Nome</option>
                    <option value="email" {{ request('campo') == 'email' ? 'selected' : '' }}>Email</option>
                    <option value="id" {{ request('campo') == 'id' ? 'selected' : '' }}>ID</option>
                </select>

                <!-- Campo de pesquisa com ícone -->
                <div class="position-relative w-25">
                    <input type="text" name="search" class="form-control ps-5" placeholder="Pesquisar Cliente..."
                        value="{{ request('search') }}">
                    <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                </div>
                <button type="submit" class="btn btn-primary">Pesquisar</button>

                <a href="{{ route('clientes.create') }}"><button type="button" class="btn btn-primary">Novo
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







        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('success'))
                <script>
                    Swal.fire({
                        title: 'Sucesso!',
                        text: '{{ session('success') }}',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = "{{ route('clientes.index') }}"; // Redirecionar após o clique no "OK"
                    });
                </script>
            @endif


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Detalhes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <th scope="row">{{ $cliente->id }}</th>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>
                                <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-info btn-sm">Ver</a>
                            </td>
                            <td>
                                <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger"
                                        onclick="return confirm('Tem certeza que deseja eliminar o cliente {{ $cliente->nome }}?')">
                                        Eliminar
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
    </div>
@endsection
