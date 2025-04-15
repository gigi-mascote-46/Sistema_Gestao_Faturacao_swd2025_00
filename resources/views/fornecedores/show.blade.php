@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Ficha do Cliente</h4>
                        <div class="mb-3">
                            <a href="{{ route('fornecedores.create') }}" class="btn btn-outline-success">Inserir novo fornecedor</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Detalhes do Fornecedor</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>ID:</strong> {{ $fornecedor->id }}</p>
                                        <p><strong>Nome:</strong> {{ $fornecedor->nome }}</p>
                                        <p><strong>Email:</strong> {{ $fornecedor->email }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Telefone:</strong> {{ $fornecedor->telefone }}</p>
                                        <p><strong>Morada:</strong> {{ $fornecedor->morada }}</p>
                                        {{-- <p><strong>Data Nascimento:</strong> {{ $fornecedor->data_nascimento }}</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('fornecedores.edit', $fornecedor) }}" class="btn btn-outline-warning me-md-2">Editar</a>
                            <form action="{{ route('fornecedores.destroy', $fornecedor) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('Tem certeza que deseja eliminar este fornecedor?')">
                                    Eliminar
                                </button>
                            </form>
                            <a href="{{ route('fornecedores.index') }}" class="btn btn-outline-secondary ms-md-2">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
