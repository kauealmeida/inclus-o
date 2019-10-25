@extends('layouts/app')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Cadastro</title>

    <link rel="stylesheet" href="css/app.css"><!-- para importar bootstrap -->

    <style>
    </style>

</head>
<!--Cadastro para o nivel de acesso -->
<body>    
    @section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <hr>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Nivel de Acesso</th>
                <th scope="col">Escola</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $user)
            <tr>            
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->nivel_acesso}}</td>
                <td>{{$user->nome_escolas}}</td>

                <td>
                    <div class="btn-group btn-group-sm" role="group">
                        <a class="btn btn-primary" href="{{ route('registrar.edit', $user->id)}}" role="button">Editar</a>
                    </div>              
                </td>            
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection  
</body>
</html>