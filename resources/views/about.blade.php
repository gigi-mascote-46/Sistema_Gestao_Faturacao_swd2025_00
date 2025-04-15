@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <div class="card-body">


                        <h1>{{ __('Sobre Nós ') }}</h1>
                        <p>
                            <h2>{{ __('Bem-vindo à nossa aplicação Laravel!') }}</h2>
                        </p>
                        <p>{{ __('Esta é uma aplicação simples desenvolvida para gerenciar clientes e fornecedores.') }}</p>
                        <p>{{ __('Você pode adicionar, editar e excluir informações de clientes e fornecedores.') }}</p>
                        <p>{{ __('Use o menu de navegação para explorar a aplicação.') }}</p>
                        <p>{{ __('Aproveite!') }}</p>
                        <br><br><br><br>

                        {{-- Adicionar uma imagem da URL externa --}}
                        <p><img src="https://images.pexels.com/photos/1797428/pexels-photo-1797428.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                                alt="Supply Chain" style="max-width: 80%; height: auto;"></p>


                        


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
