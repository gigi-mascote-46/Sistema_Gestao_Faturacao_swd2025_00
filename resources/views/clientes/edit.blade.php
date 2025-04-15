@extends('layouts.app')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Cliente</h4>
                    </div>

                    <div class="card-body">
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



                        <form action="{{ route('clientes.update', $cliente) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" name="nome" id="nome"
                                       value="{{ old('nome', $cliente->nome) }}"
                                       class="form-control @error('nome') is-invalid @enderror">
                                @error('nome')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" name="telefone" id="telefone"
                                       value="{{ old('telefone', $cliente->telefone) }}"
                                       class="form-control @error('telefone') is-invalid @enderror">
                                @error('telefone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email"
                                       value="{{ old('email', $cliente->email) }}"
                                       class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="morada" class="form-label">Morada</label>
                                <input type="text" name="morada" id="morada"
                                       value="{{ old('morada', $cliente->morada) }}"
                                       class="form-control @error('morada') is-invalid @enderror">
                                @error('morada')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                                <input type="date" name="data_nascimento" id="data_nascimento"
                                       value="{{ old('data_nascimento', $cliente->data_nascimento) }}"
                                       class="form-control @error('data_nascimento') is-invalid @enderror">
                                @error('data_nascimento')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-outline-warning">Guardar</button>
                            <button type="reset" class="btn btn-outline-danger">Limpar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

