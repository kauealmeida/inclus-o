@extends('layouts/app')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cadastrar Escola</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script type="text/javascript">
        window.onload=function(){
        
        //Busca dinameica pelo nome
        var filtro2 = document.getElementById('filtro-nome');
        var tabela2 = document.getElementById('lista');
        filtro2.onkeyup = function() {
            var nomeFiltro = filtro2.value;
            for (var i = 1; i < tabela2.rows.length; i++) {
                var conteudoCelula = tabela2.rows[i].cells[2].innerText;
                var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
                tabela2.rows[i].style.display = corresponde ? '' : 'none';
            }
        };    
        }    
    </script>
</head>
<body>    
    @section('content')
    <table class="table" id="lista">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome da Escola</th>
            </tr>
        </thead>
        <tbody>            
            @foreach($escola as $escola)
            <tr>
                <td scope="row">{{$escola->id_escolas}}</td>                
                <td>{{$escola->nome_escolas}}</td>
                <td>
                    <div class="btn-group">
                        <a href="" data-toggle="modal" data-target="#edit-modal{{$escola->id_escolas}}" class="btn btn-primary">Editar</a>                     
                    </div>
                  </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @foreach($escola2 as $escola)
    <div class="modal fade" id="edit-modal{{$escola->id_escolas}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">                        
                    <h4 class="modal-title">Cadastrar Nova Escola</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">                    
                    <form action="{{ route('cadastrar_escola.update', $escola->id_escolas) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group col-12">
                            <div class="form-row">
                                <input type="text" class="form-control" name="nome_escolas" id="" placeholder="Nome Escola" value="{{$escola->nome_escolas}}">
                            </div>
                        </div>
                        <div class="form-group col">
                            <div class="form-row">
                                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>                            
                                </form>
                                <form action="{{ route('cadastrar_escola.destroy', $escola->id_escolas)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    
                </div>           
            </div>
        </div>
    </div>
    @endforeach

   
    
    <div class="btn-group">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-modal">
         Adicionar</button>                      
    </div>

    <div class="modal fade" id="create-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">                        
                    <h4 class="modal-title">Cadastrar Nova Escola</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('cadastrar_escola.store') }}" method="post">
                        @csrf
                        <div class="form-group col-12">
                            <div class="form-row">
                                <input type="text" class="form-control" name="nome_escolas" id="" placeholder="Nome Escola">
                            </div>
                        </div>
                        <div class="form-group col-3">
                            <div class="form-row">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>           
            </div>
        </div>
    </div>
    @endsection  
</body>
</html>