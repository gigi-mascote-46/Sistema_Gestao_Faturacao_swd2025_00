<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <!-- Bootstrap Bundle JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>

    {{-- Importar Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Importar SweetAlert2 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Importar Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <style>
        .card-body {

            justify-content: center;
            align-items: center;
            overflow: hidden;
            font-family: Arial, Helvetica, sans-serif;
            color: #241616;
            text-align: center;

        }

        .card-body h1 {
            font-size: 2.5rem;
            color: #F58F29;
            font-weight: bold
        }

        .card-body h2 {
            font-size: 1.5rem;
            color: #262168;
            font-style: italic;

        }

        .card-body p {
            font-size: 1.2rem;
            color: #666;
        }

        /* CSS DE NAV BAR  */
        /* estilizado tambem para versao movel  */

        .navbar {
            background-color: #262168;
            /* cor de fundo */
            padding: 10px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar .nav-link {
            color: #ffffff;
            /* cor do texto */
            margin-right: 15px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .navbar .nav-link:hover {
            color: #ffd700 !important;
            /* cor ao passar o rato */
            text-decoration: underline;
        }

        .navbar .navbar-brand {
            color: #ffffff;
            /* cor do texto */
            font-weight: 700;
            font-size: 1.5rem;
        }

        .navbar-toggler {
            border: none;
            background: transparent;
            outline: none;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23F58F29' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(245,143,41, 1)' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        .collapse:not(.show) {
            display: none;
            transition: all 0.3s ease;
        }

        .navbar-collapse {
            transition: all 0.3s ease;
        }


        /* CSS para dark mode */

        .dark-mode {
            background-color: #1e1e2f;
            color: #f5f5f5;
        }

        .dark-mode h2 {

            color: #f5f5f5;
        }

        .dark-mode .navbar {
            background-color: #0e0e1a;
        }

        .dark-mode .navbar .nav-link,
        .dark-mode .navbar .navbar-brand {
            color: #f5f5f5;
        }

        .dark-mode .navbar .nav-link:hover {
            color: #ffd700 !important;
        }

        .dark-mode .card-body {
            background-color: #2b2b3c;
            color: #ddd;
        }

        /* CSS para container  */

        /* Melhor visual para os links em mobile */
        @media (max-width: 768px) {
            .navbar-nav .nav-link {
                padding: 10px;
                font-size: 1.2rem;
                text-align: left;
            }

            .navbar {
                padding: 15px;
            }

            .navbar .dropdown-menu {
                background-color: #262168;
                color: white;
            }

            .dark-mode .navbar .dropdown-menu {
                background-color: #0e0e1a;
            }
        }

        button i,
        .form-check-label i {
            margin-right: 8px;
            /* Ajusta o espaçamento */
        }
    </style>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('logo1.png') }}" alt="Logo" style="height: 42px; max-height: 5vh; width: auto;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <a href="{{ route('home') }}" class="nav-link">HOME</a>
                        <a href="{{ route('about') }}" class="nav-link">ABOUT</a>
                        <a href="{{ route('clientes.index') }}" class="nav-link">CLIENTES</a>
                        <a href="{{ route('fornecedores.index') }}" class="nav-link">FORNECEDORES</a>
                        <a href="{{ route('faturas.index') }}" class="nav-link">FATURAS</a>
                        {{-- users --}}
                        <a href="{{ route('users.index') }}" class="nav-link">UTILIZADORES</a>

                        <a href="{{ route('clientes.exemplo_template') }}"><button class="btn btn-primary">EXEMPLO</button></a>
                        {{-- produtos --}}

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">


                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="fas fa-user-circle me-2"></i>{{ __('Perfil') }}
                                    </a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i>{{ __('Sair') }}
                                    </a></li>
                                </ul>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                            {{-- Dark mode com icone de lua  --}}
                            <li class="nav-item">
                                <button class="btn btn-sm toggle-darkmode" onclick="toggleDarkMode()"
                                    title="Alternar modo escuro">
                                    🌙
                                </button>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
            localStorage.setItem('theme', document.body.classList.contains('dark-mode') ? 'dark' : 'light');
        }

        // Mantém a escolha do utilizador mesmo após atualizar a página
        document.addEventListener('DOMContentLoaded', () => {
            if (localStorage.getItem('theme') === 'dark') {
                document.body.classList.add('dark-mode');
            }
        });
    </script>

    @include('components.footer')

    <style>
        /* Estilos para o footer */
        .footer {
            background-color: #262168;
            color: white;
            padding: 2rem 0;
            margin-top: auto;
        }

        .footer a {
            color: #F58F29;
        }

        .footer a:hover {
            color: #ffd700;
            text-decoration: none;
        }

        .footer h5 {
            color: #F58F29;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        .footer .list-unstyled li {
            color: #F58F29;
        }

        .social-links a {
            display: inline-block;
            width: 36px;
            height: 36px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 36px;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background-color: #F58F29;
            color: white !important;
        }

        /* Dark mode para footer */
        .dark-mode .footer {
            background-color: #0e0e1a;
            border-color: #333;
        }

        .dark-mode .footer a {
            color: #F58F29;
        }

        .dark-mode .footer a:hover {
            color: #ffd700;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .footer .col-md-4 {
                margin-bottom: 1.5rem;
                text-align: center;
            }

            .social-links {
                justify-content: center;
            }
        }
    </style>
</body>

</html>
