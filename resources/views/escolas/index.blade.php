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
    <style>
        .cont-tabela{
            overflow: auto;
            width: auto;
            height: 300px;
            border:solid 1px;
            border-radius: 5px;
        }
    </style>

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

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
    </div>
    @endif

    {{-- Inicio -- Cadastro Escola --}}
    <div class="row">
        <div class="col">
            <h4>Cadastro Escola</h4>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-inline">
                <form action="{{ route('cadastrar_escola.store') }}" method="post">
                    @csrf
                    <input type="text" name="nome_escolas" id="" class="form-control" placeholder="Nome Escola">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row my-2">
        <div class="col">
            <div class="cont-tabela">
                <table class="table" id="lista">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome da Escola</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>            
                        @foreach($escola as $escola)
                        <tr>
                            <td scope="row">{{$escola->id_escolas}}</td>                
                            <td>{{$escola->nome_escolas}}</td>
                            <td style="text-align: right">
                                <div class="btn-group">
                                    <a href="" data-toggle="modal" data-target="#edit-modal-escola{{$escola->id_escolas}}" class="btn btn-primary">Editar</a>                     
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>    
            </div>
        </div>
    </div>

    @foreach($escola2 as $escola)
    <div class="modal fade" id="edit-modal-escola{{$escola->id_escolas}}">
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

    {{-- Final -- Cadastro Escola --}}

    <hr>

    {{-- Inicio -- Cadastro Bairro --}}

    <div class="row">
        <div class="col">
            <H4>Cadastro Bairro</H4>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-inline">
                <form action="{{ route('cadastrar_bairro.store') }}" method="post">
                    @csrf
                    <input type="text" name="nome_bairros" id="" class="form-control" placeholder="Nome Bairro">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-8">
            <div class="cont-tabela">
                <table class="table" id="lista">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Bairro</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>            
                        @foreach($bairro as $bairro)
                        <tr>
                            <td scope="row">{{$bairro->id_bairros}}</td>                
                            <td>{{$bairro->nome_bairros}}</td>
                            <td style="text-align: right">
                                <div class="btn-group">
                                    <a href="" data-toggle="modal" data-target="#edit-modal-bairro{{$bairro->id_bairros}}" class="btn btn-primary">Editar</a>                     
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach($bairro2 as $bairro)
    <div class="modal fade" id="edit-modal-bairro{{$bairro->id_bairros}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">                        
                    <h4 class="modal-title">Cadastrar Nova Escola</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">                    
                    <form action="{{ route('cadastrar_bairro.update', $bairro->id_bairros) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group col-12">
                            <div class="form-row">
                                <input type="text" class="form-control" name="nome_bairros" id="" placeholder="Nome Bairro" value="{{$bairro->nome_bairros}}">
                            </div>
                        </div>
                        <div class="form-group col">
                            <div class="form-row">
                                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>                            
                                </form>
                                <form action="{{ route('cadastrar_bairro.destroy', $bairro->id_bairros)}}" method="post">
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

    {{-- Final -- Cadastro Bairro --}}
    @endsection  
</body>
</html>