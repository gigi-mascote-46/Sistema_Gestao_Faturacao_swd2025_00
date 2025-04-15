@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @auth
                            @if (auth()->user()->role === 'admin')
                                <!-- Mostrar conteúdo exclusivo para admins -->
                                <p>Bem-vindo, Administrador!</p>
                            @else
                                <!-- Mostrar conteúdo para usuários comuns -->
                                <p>Bem-vindo, {{ auth()->user()->name }}!</p>
                            @endif
                        @endauth

{{-- colocar imagem aqui --}}


                        <h1><img src="{{ asset('logo1-removebg-preview.png') }}" alt="Logo"
                            style="height: 50px; margin-right: 15px;">{{ __('WELCOME TO OUR WEBSITE') }} <img src="{{ asset('logo1-removebg-preview.png') }}" alt="Logo"
                            style="height: 50px; margin-right: 15px;"></h1>
                        <p>
                        <h2>{{ __('This is a simple dashboard page') }}</h2>
                        </p>
                        <br><br><br><br>

                        {{-- Adicionar uma imagem da URL externa --}}
                        <p><img src="https://images.pexels.com/photos/1797428/pexels-photo-1797428.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                                alt="Supply Chain" style="max-width: 80%; height: auto;"></p>

                        <p>{{ __('This is a simple Laravel application.') }}</p>
                        <p>{{ __('You can manage clients and suppliers.') }}</p>
                        <p>{{ __('Use the navigation menu to explore the application.') }}</p>
                        <p>{{ __('Enjoy!') }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
