@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{-- {{ __('Listagem de Clientes') }} --}}
                        <h4>Listagem de Utilizadores</h4>
                        <p><a href="{{ route('users.create') }}"><button type="button"
                                    class="btn btn-outline-success">Inserir novo Cliente</button></a></p>

                    </div>


                    {{-- search box and button --}}
                    <div class="card-body">
                        <form method="GET" action="{{ route('users.index') }}" class="mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Pesquisar Cliente..."
                                value="{{ request('search') }}">
                        </form>


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
                                    window.location.href = "{{ route('users.index') }}"; // Redirecionar após o clique no "OK"
                                });
                            </script>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" colspan=3>Manutenção</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->nome }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{ route('users.show', $user) }}"
                                                class="btn btn-outline-success">Mostrar</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="btn btn-outline-warning">Editar</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('users.destroy', $user) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger"
                                                    onclick="return confirm('Tem certeza que deseja eliminar o utilizador {{ $user->nome }}?')">
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
        </div>
    </div>
@endsection
