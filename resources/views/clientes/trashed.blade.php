@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Clientes Arquivados</h4>
                    <a href="{{ route('clientes.index') }}" class="btn btn-outline-primary">
                        Voltar para clientes ativos
                    </a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($clientes->isEmpty())
                        <div class="alert alert-info">
                            Nenhum cliente arquivado encontrado.
                        </div>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->nome }}</td>
                                    <td>{{ $cliente->email }}</td>
                                    <td>{{ $cliente->telefone }}</td>
                                    <td>
                                        <form action="{{ route('clientes.restore', $cliente->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-outline-success">
                                                Restaurar
                                            </button>
                                        </form>
                                        <form action="{{ route('clientes.forceDelete', $cliente->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Tem certeza que deseja remover permanentemente este cliente?')">
                                                Remover
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
