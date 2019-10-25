@extends('layouts/app')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cadastro</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>    
    @section('content')        
        <table class="table" id="lista">
        <thead class="thead-dark">
            <tr>            
            <th scope="col">Escola</th>
            <th scope="col">Necessidade Especial</th>
            <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aluno as $aluno)
            <tr>
                <td>{{$aluno->nome_escolas}}</td>
                <td>{{$aluno->desc_necessidades}}</td>
                <td>{{$aluno->total}}</td>
            </tr>
            @endforeach
        </tbody>
        </table>

        <a href="/inclusao/public/relatorios"><button type="button" class="btn btn-secondary">Voltar</button></a>
        
    @endsection  
</body>
</html>