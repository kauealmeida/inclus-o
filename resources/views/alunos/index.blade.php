@extends('layouts/app')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cadasto</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript">
        window.onload=function(){
        
        //Busca dinamica pelo RA
        var filtro = document.getElementById('filtro-RA');
        var tabela = document.getElementById('lista');
        filtro.onkeyup = function() {
            var nomeFiltro = filtro.value;
            for (var i = 1; i < tabela.rows.length; i++) {
                var conteudoCelula = tabela.rows[i].cells[0].innerText;
                var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
                tabela.rows[i].style.display = corresponde ? '' : 'none';
            }
        };
        
        //Busca dinameica pelo nome
        var filtro2 = document.getElementById('filtro-nome');
        var tabela2 = document.getElementById('lista');
        filtro2.onkeyup = function() {
            var nomeFiltro = filtro2.value;
            for (var i = 1; i < tabela2.rows.length; i++) {
                var conteudoCelula = tabela2.rows[i].cells[1].innerText;
                var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
                tabela2.rows[i].style.display = corresponde ? '' : 'none';
            }
        };    
        }    
    </script>
</head>
<body>    
    @section('content')
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
        </div>
        @endif
        <h3>Buscar</h3>
        <form class="form-inline">
            @csrf
            <div class="form-group mb-2">
                <input class="form-control" type="text" name="buscaRA" id="filtro-RA" placeholder="RA">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <input class="form-control" type="text" name="buscaNome" id="filtro-nome" placeholder="Nome"> 
            </div>      
            <div class="form-group mx-sm-4 mb-2">
                <b><a href="/inclusao/public/inclusao">Limpar</a></b>
            </div>
        </form>

        <hr>

        <table class="table" id="lista">
        <thead class="thead-dark">
            <tr>
            <th scope="col">RA</th>
            <th scope="col">Nome</th>
            <th scope="col">Data Nascimento</th>
            <th scope="col">Escola</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($aluno as $aluno)
            <tr>            
                <td>{{$aluno->RA}}</td>
                <td>{{$aluno->nome_aluno}}</td>
                <td>{{$aluno->data_nascimento}}</td>
                <td>{{$aluno->nome_escolas}}</td>

                <td>
                    <div class="btn-group btn-group-sm" role="group">
                        <a class="btn btn-primary" href="{{ route('inclusao.edit', $aluno->id_alunos)}}" role="button">Editar</a>
                        
                    </div>              
                </td>            
            </tr>
            @endforeach
        </tbody>
        </table>
    @endsection  
</body>
</html>