@extends('layouts.app')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cadasto</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <Style>
        p{
            word-wrap: break-word;
        }
    </Style>
    
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

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">RA</th>
                <th scope="col">Nome</th>
                <th scope="col">Data Nascimento</th>
                <th scope="col">Escola</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <!--função para visualizar os alunos de uma certa escola -->
            @foreach($aluno as $aluno)
            @if(Auth::user()->fk_users_escolas == $aluno->fk_alunos_escolas)
            <tr>            
                <th scope="row">{{$aluno->id_alunos}}</th>
                <td>{{$aluno->RA}}</td>
                <td>{{$aluno->nome_aluno}}</td>
                <td>{{$aluno->data_nascimento}}</td>
                <td>{{$aluno->nome_escolas}}</td>

                <td>
                    <div class="btn-group btn-group-sm" role="group">
                        {{-- <a class="btn btn-primary" href="{{ route('inclusao.edit', $aluno->id_alunos)}}" role="button">Detalhes</a> --}}

                        <a href="" data-toggle="modal" data-target="#Detalhe-modal-xl{{ $aluno->id_alunos }}" class="btn btn-primary">Detalhe</a>

                        <div  id="Detalhe-modal-xl{{ $aluno->id_alunos }}" class="modal fade Detalhe-modal-xl" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="">{{$aluno->nome_aluno}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!--Formulario das informações do aluno-->
                                    <!--"comentar a parte do explode" -->
                                    <div class="modal-body">
                                        <div class="row">
                                            <p class="col-4">RA:</p>
                                            <p class="col-sm-8">{{$aluno->RA}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-4">Nome:</p>
                                            <p class="col-sm-8">{{$aluno->nome_aluno}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-4">Data Nascimento:</p>
                                            <p class="col-sm-8">{{$aluno->data_nascimento}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-4">Bairro:</p>
                                            <p class="col-sm-8">{{$aluno->bairro}}</p>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <p class="col-4">Necessidades:</p>
                                            <p class="col-sm-8">{{$aluno->desc_necessidades}}</p>
                                        </div>
                                        @if($aluno->desc_necessidades == "Deficiencia Múltipla")
                                        <div class="row">
                                            <p class="col-4">Descrição (Deficiencia Multipla:</p>
                                            <p class="col-sm-8">{{$aluno->detalhe_necessidades}}</p>
                                        </div>
                                        @endif
                                        <div class="row">
                                            <p class="col-4">Diagnostico:</p>
                                            <p class="col-sm-8">{{$aluno->diagnostico}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-4">Nível de Escrita:</p>
                                            <p class="col-sm-8">{{$aluno->nv_escrita}}</p>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <p class="col-4">Adaptações:</p>
                                            <div>
                                                @foreach (explode(";",$aluno->adaptacoes) as $item)
                                                <li class="col">{{$item}}</li>
                                                @endforeach
                                            </div>
                                        </div>
                                        @if(count(explode(";", $aluno->adaptacoes)) > 1)
                                        <br />
                                        @endif
                                        @if(in_array("Outro", explode(";",$aluno->adaptacoes) ) )
                                        <div class="row">
                                            <p class="col-4">Adaptações (Outro):</p>
                                            <p class="col-sm-8">{{$aluno->adaptacoes_outros}}</p>
                                        </div>
                                        @endif

                                        @if($aluno->EC == 1)
                                        <div class="row">
                                            <p class="col-4">Estudo de Caso:</p>
                                            <p class="col-sm-8">Sim</p>
                                        </div>
                                        @else
                                        <div class="row">
                                            <p class="col-4">Estudo de Caso:</p>
                                            <p class="col-sm-8">Não</p>
                                        </div>
                                        @endif
                                        @if($aluno->PEP == 1)
                                        <div class="row">
                                            <p class="col-4">Plano de Ensino Personalizado:</p>
                                            <p class="col-sm-8">Sim</p>
                                        </div>
                                        @else
                                        <div class="row">
                                            <p class="col-4">Plano de Ensino Personalizado:</p>
                                            <p class="col-sm-8">Não</p>
                                        </div>
                                        @endif
                                        <div class="row">
                                            <p class="col-4">Flexibilização de Provas:</p>
                                            <p class="col-sm-8">{{$aluno->flex_prova}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-4">Apoio:</p>
                                            <div>
                                                @foreach(explode(";",$aluno->apoio) as $apoio)
                                                <li class="col">{{$apoio}}</li>
                                                @endforeach
                                            </div>
                                        </div>
                                        @if(count(explode(";", $aluno->apoio)) > 1)
                                        <br />
                                        @endif
                                        <div class="row">
                                            <p class="col-4">Refêrencia:</p>
                                            <div>
                                                @foreach(explode(";", $aluno->referencia) as $referencia)
                                                <li class="col">{{$referencia}}</li>
                                                @endforeach
                                            </div>
                                        </div>
                                        @if(count(explode(";", $aluno->referencia)) > 1)
                                        <br />
                                        @endif
                                        <div class="row">
                                            <p class="col-4">Atendimento Externo:</p>
                                            <p class="col-sm-8">{{$aluno->atend_externo}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-4">CRIES:</p>
                                            <div>
                                                @foreach(explode(";", $aluno->cries) as $cries)
                                                <li class="col">{{$cries}}</li>
                                                @endforeach
                                            </div>
                                        </div>
                                        @if(count(explode(";", $aluno->cries)) > 1)
                                        <br />
                                        @endif
                                        <div class="row">
                                            <p class="col-4">CRIES (Observações):</p>
                                            <p class="col-sm-8">{{$aluno->desc_cries}}</p>
                                        </div>
                                        @if($aluno->sala_recursos == 1)
                                        <div class="row">
                                            <p class="col-4">Sala de Recursos:</p>
                                            <p class="col-sm-8">Sim</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-4">Sala de Recursos (Observações):</p>
                                            <p class="col-sm-8">{{$aluno->desc_sala_recursos}}</p>
                                        </div>
                                        @else
                                        <div class="row">
                                            <p class="col-4">Sala de Recursos:</p>
                                            <p class="col-sm-8">Não</p>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="{{route('aluno.pdf', $aluno->id_alunos)}}" target="blank">Imprimir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>            
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    @endsection  
</body>
</html>