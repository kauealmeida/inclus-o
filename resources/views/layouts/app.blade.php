<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Inclusão') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="jquery.js"></script>

<script type="text/javascript">

</script>

<link rel="shortcut icon" href="img/prefeitura.png" >

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .bgBlack{
            background-color: #333333;
            height: 100px;  
            margin: 0 auto;
        }
        .bgBlackFooter{
            background-color: #333333;
            height: 80px;  
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm bgBlack">
            <div class="container-fluid">
                <a style="font-size:250%" class="navbar-brand" href="{{ url('/home') }}">
                    <b>INCLUSÃO</b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a style="font-size:150%" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                @endif -->
                                @else
                                <li class="nav-item dropdown">
                                    <a style="font-size:150%" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

        <!-- verificar quem esta acessando o site para mostrar o menu lateral de acordo com o nivel de acesso
        -->
        <!-- Verifica se eh um convidado que esta acessando o site, ou seja, alguem que nao esteja logado ao site -->
        @guest
        <div class="container-fluid">
            <br>
            <div class="row">
                <div class="col-3">
                    <h2><strong>Educação Inclusiva</strong></h2>
                    <p class="lead">
                        Sistema de inscrição e visualização de alunos
                    </p>
                </div>
                <div class="col">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
        
        <div class="">
            @include('layouts.footer') 
        </div>
        <!-- Caso esteja logado -->
        @else
        <!-- verificar quem esta logando ao sistema, administrador, usuario ou TO para apresentar o menu adequado ao nivel -->
        @if(Auth::user()->nivel_acesso == "Admin")
        <div class="container-fluid">
            <br>
            <div class="row">
                <div class="col-3">
                 <div class="bg-light border-right" id="sidebar-wrapper">
                  <div class="sidebar-heading">Educação Inclusiva </div>
                  <div class="list-group list-group-flush">
                    <a href="/inclusao/public/inclusao/create" class="list-group-item list-group-item-action bg-light">Cadastrar Alunos</a>
                    <a href="/inclusao/public/inclusao/" class="list-group-item list-group-item-action bg-light">Editar Alunos Cadastrados</a>
                    <a href="/inclusao/public/registrar/create" class="list-group-item list-group-item-action bg-light">Cadastrar Usuario da Escola</a>
                    <a href="/inclusao/public/registrar" class="list-group-item list-group-item-action bg-light">Editar Escola</a>
                    <a href="/inclusao/public/cadastrar_escola-bairro" class="list-group-item list-group-item-action bg-light">Cadastrar Escolas/Bairros</a>
                </div>
                <div class="sidebar-heading">Relatórios </div>
                <div class="list-group list-group-flush">
                    <a href="/inclusao/public/relatorios" class="list-group-item list-group-item-action bg-light">Relatório Geral</a>
                </div>
            </div>
        </div>
        <div class="col">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</div>

<div class="">
    @include('layouts.footer') 
</div>
@elseif (Auth::user()->nivel_acesso == "Escola")
<div class="col">
    <main class="py-4">
        @yield('content')
    </main>
</div>
@else
<div class="col">
    <main class="py-4">
        @yield('content')
    </main>
</div>
@endif

@endguest        

</div>

</body>
</html>
