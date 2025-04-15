@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Ficha do Cliente</h4>
                        <div class="mb-3">
                            <a href="{{ route('clientes.create') }}" class="btn btn-outline-success">Inserir novo Cliente</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Detalhes do Cliente</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>ID:</strong> {{ $cliente->id }}</p>
                                        <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
                                        <p><strong>Email:</strong> {{ $cliente->email }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Telefone:</strong> {{ $cliente->telefone }}</p>
                                        <p><strong>Morada:</strong> {{ $cliente->morada }}</p>
                                        <p><strong>Data Nascimento:</strong> {{ $cliente->data_nascimento }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-outline-warning me-md-2">Editar</a>
                            <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('Tem certeza que deseja eliminar este cliente?')">
                                    Eliminar
                                </button>
                            </form>
                            <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary ms-md-2">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
