@extends('layouts/app')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cadastro</title>

    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <link rel="stylesheet" href="/inclusao/public/css/app.css">

    <style>
        .ScrollChk { border:2px solid #ccc;  height: 100px; overflow-y: scroll; border-radius: 4px;}

        input[type=checkbox] {
        transform: scale(1.5);
        margin: 6px;
        }
    </style>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript"></script>

    <link rel="shortcut icon" href="img/prefeitura.png" >
    <script> 
        window.onload = function(){
            document.getElementById("div_detalhe_necessidades").style.display = "none";
            document.getElementById("mensagemDM").style.display = "none";
            document.getElementById("div_adaptacoes_outros").style.display = "none"
            document.getElementById("div_sala_recursos").style.display = "none"

        }       
        function Descr_necessidades(){
            var SelNecess = document.getElementById("fk_alunos_necessidades_especiais").value;
            var textarea_necessidades = document.getElementById("div_detalhe_necessidades");

            if(SelNecess == 5){                
                document.getElementById("mensagemDM").style.display = "block";
                textarea_necessidades.style.display = "block";
                document.getElementById("detalhe_necessidades").required = true;
            }else{
                document.getElementById("mensagemDM").style.display = "none";
                textarea_necessidades.style.display = "none";
                document.getElementById("detalhe_necessidades").required = false;
            }        
        }

        function Outros_adaptacoes(){
            var checkAdaptacoes = document.getElementById("adaptacoes_outro");
            var textarea_adaptacoes = document.getElementById("div_adaptacoes_outros")

            if (checkAdaptacoes.checked == true){
                textarea_adaptacoes.style.display = "block";
                document.getElementById("adaptacoes_outros").required = true;
            } else {
                textarea_adaptacoes.style.display = "none";
                document.getElementById("adaptacoes_outros").required = false;
            }
        }

        function desc_recursos(){
            var checkrecursos = document.getElementById("sala_recursos");
            var textarea_recursos = document.getElementById("div_sala_recursos")

            if (checkrecursos.checked == true){
                textarea_recursos.style.display = "block";
                document.getElementById("desc_sala_recursos").required = true;
            } else {
                textarea_recursos.style.display = "none";
                document.getElementById("desc_sala_recursos").required = false;
            }
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
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
    </div>
    @endif


    <div class="container" style="">
        <h2>Cadastro de alunos com necessidades especiais</h2>

        <form action="{{ route('inclusao.store') }}" method="post" name="cadAluno">
            @csrf
            <!-- INICIO - Campos para dados do aluno -->
            <div class="form-row">
                <div class="form-group col-3">
                    <label for="">RA</label>
                    <input type="text" class="form-control" name="RA" id="RA" placeholder="RA" data-placement="top" title="RA do Aluno" required autofocus>
                </div>          
            </div>

            <div class="form-row">
                <div class="form-group col-7">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="nome_aluno" id="" placeholder="Nome" data-placement="top" title="Nome Completo do Aluno" required>
                </div>

                <div class="form-group col-3">
                    <label for="">Data Nascimento</label>
                    <input type="date" class="form-control" name="data_nascimento" id="" placeholder="Data Nascimento" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-3">
                    <label for="">Bairro</label>
                    <select class="form-control" name="fk_alunos_bairros" id="" required>
                        <option value="">Selecione</option>
                        @foreach($bairro as $bairro)
                        <option value="{{$bairro->id_bairros}}">{{$bairro->nome_bairros}}</option>
                        @endforeach
                    </select>
                </div>          
            </div>

            <div class="form-row">
                <div class="form-group col-4">
                    <label for="">Escola</label>
                    <select class="form-control" name="fk_alunos_escolas" id="fk_alunos_escolas" required>
                        <option value="">Selecione</option>
                        @foreach($escolas as $escolas)
                        <option value="{{$escolas->id_escolas}}">{{$escolas->nome_escolas}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-2">
                    <label for="">Período</label>
                    <select class="form-control" name="fk_alunos_periodos" id="fk_alunos_periodos" required>
                        <option value="">Selecione</option>
                        @foreach($periodo as $periodo)
                        <option value="{{$periodo->id_periodos}}">{{$periodo->desc_periodos}}</option>
                        @endforeach
                    </select>
                </div> 

                <div class="form-group col-2">
                    <label for="">Série</label>
                    <select class="form-control" name="fk_alunos_series" id="fk_alunos_series" required>
                        <option value="">Selecione</option>
                        @foreach($serie as $serie)
                        <option value="{{$serie->id_series}}">{{$serie->desc_series}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-2">
                    <label for="">Turma</label>
                    <select class="form-control" name="fk_alunos_turmas" id="fk_alunos_turmas" required>
                        <option value="">Selecione</option>
                        @foreach($turma as $turma)
                        <option value="{{$turma->id_turmas}}">{{$turma->desc_turmas}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- FINAL - Campos para dados do aluno -->
            <hr />
            <!-- INICIO - Necessidades Especiais do Aluno -->
            <div class="form-row">
                <div class="form-group col-5">
                    <label for="">Necessidades Educacionais Especiais</label>
                    <select class="form-control" name="fk_alunos_necessidades_especiais" id="fk_alunos_necessidades_especiais" required onchange="Descr_necessidades()">
                        <option value="">Selecione</option>
                        @foreach($necessidades as $necessidades)
                            <option value="{{$necessidades->id_necessidades}}">{{$necessidades->desc_necessidades}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    
            <p class="" id="mensagemDM" style="color: red;"> <b>*</b> Descreva quais deficiências no campo abaixo</p>
    
            <div class="form-row" id="div_detalhe_necessidades">
                <div class="form-group col-10">
                    <label for="">Descrição (Deficiência Multipla)</label>
                    <textarea class="form-control" name="detalhe_necessidades" id="detalhe_necessidades" cols="30" rows="2"></textarea >
                </div>          
            </div>

            <div class="form-row">
                <div class="form-group col-10">
                    <label for="diagnostico">Diagnostico</label>
                    <textarea class="form-control" name="diagnostico" id="diagnostico" cols="30" rows="3" required></textarea >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-5">
                    <label for="">Nível de Escrita</label>
                    <select class="form-control" name="nv_escrita" id="nv_escrita" required>
                        <option value="">Selecione</option>
                        <option value="Garatuja">Garatuja</option>
                        <option value="Pré-Silábica">Pré-Silábica</option>
                        <option value="Silábico sem valor">Silábico sem valor</option>
                        <option value="Silábico com valor">Silábico com valor</option>
                        <option value="Silábica Alfabética">Silábica Alfabética</option>
                        <option value="Alfabética">Alfabética</option>
                        <option value="Em Avaliação">Em Avaliação</option>
                    </select>
                </div>
            </div>
            <!-- FINAL - Necessidades Especiais do Aluno -->
            <hr />
            <!-- INICIO - Suporte necessario ao aluno -->
            <div class="form-row">
                <div class="form-group col-5">
                    <label for="">Adaptações</label>
                    <div class="ScrollChk" style="width: 450px;">
                        <input type="checkbox" name="adapt[]" id="adaptacoes" value="Braile">
                        <label for="">Braile</label>
                        <br />

                        <input type="checkbox" name="adapt[]" id="adaptacoes" value="Libras">
                        <label for="">Libras</label>
                        <br />

                        <input type="checkbox" name="adapt[]" id="adaptacoes" value="Ampliação">
                        <label for="">Ampliação</label>
                        <br />

                        <input type="checkbox" name="adapt[]" id="adaptacoes" value="Menor exigência - curriculo">
                        <label for="">Menor exigência - curriculo</label>
                        <br />

                        <input type="checkbox" name="adapt[]" id="adaptacoes" value="Igual ou Maior exigência - curriculo">
                        <label for="">Igual ou Maior exigência - curriculo</label>
                        <br />

                        <input type="checkbox" name="adapt[]" id="adaptacoes" value="Utilização de imagens ou recursos concretos">
                        <label for="">Utilização de imagens ou recursos concretos</label>
                        <br />

                        <input type="checkbox" name="adapt[]" id="adaptacoes" value="Atividades de acordo com a abordagem Teacch">
                        <label for="">Atividades de acordo com a abordagem Teacch</label>
                        <br />

                        <input type="checkbox" name="adapt[]" id="adaptacoes" value="Atividades estruturadas / pranchas">
                        <label for="">Atividades estruturadas / pranchas</label>
                        <br />

                        <input type="checkbox" name="adapt[]" id="adaptacoes" value="Tempo maior para realização  de atividades e avaliações">
                        <label for="">Tempo maior para realização  de atividades e avaliações</label>
                        <br />

                        <input type="checkbox" name="adapt[]" id="adaptacoes" value="Nenhum">
                        <label for="">Nenhum</label>
                        <br />

                        <input type="checkbox" name="adapt[]" id="adaptacoes_outro" value="outro" onclick="Outros_adaptacoes()">
                        <label for="">Outro (Descreva)</label>
                        <br />
                    </div>
                </div>
            </div>

            <div class="form-row" id="div_adaptacoes_outros">
                <div class="form-group col-10">
                    <label for="">Adaptações (Outro)</label>
                    <textarea class="form-control" name="adaptacoes_outros" id="adaptacoes_outros" cols="30" rows="2"></textarea>
                </div>          
            </div>

            <div class="form-row">                
                <div class="form-check col">
                    <input type="hidden" name="EC" value="0">
                    <input type="checkbox" class="" id="" name="EC" value="1">
                    <label class="form-check-label" for="">Estudo de Caso</label> 
                </div>                
            </div>
    
            <div class="form-row">
                <div class="form-check col-5">
                    <input type="hidden" name="PEP" value="0">
                    <input type="checkbox" class="" id="" name="PEP" value="1">
                    <label class="" for="">Plano de Ensino Personalizado</label>
                </div>                
            </div>

            <div class="form-row">
                <div class="form-group col-10">
                    <label for="">Flexibilização de provas</label>
                    <textarea class="form-control" name="flex_prova" id="flex_prova" cols="30" rows="3"></textarea>
                </div>          
            </div>

            <div class="form-row">
                <div class="form-group col-5">
                    <label for="">Apoio</label>
                    <div class="ScrollChk">
                        <input type="checkbox" name="apoio[]" id="" value="Auxiliar">
                        <label for="">Auxiliar</label>
                        <br />

                        <input type="checkbox" name="apoio[]" id="" value="Orientador">
                        <label for="">Orientador</label>
                        <br />

                        <input type="checkbox" name="apoio[]" id="" value="Escriba">
                        <label for="">Escriba</label>
                        <br />

                        <input type="checkbox" name="apoio[]" id="" value="Leitor">
                        <label for="">Leitor</label>
                        <br />

                        <input type="checkbox" name="" id="apoio[]" value="Estagiário">
                        <label for="">Estagiário</label>
                        <br />

                        <input type="checkbox" name="" id="apoio[]" value="Nenhum">
                        <label for="">Nenhum</label>
                        <br />
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-5">
                    <label for="">Referencia</label>
                    <div class="ScrollChk">
                        <input type="checkbox" name="referencia[]" id="" value="Psicólogo">
                        <label for="">Psicólogo</label>
                        <br />

                        <input type="checkbox" name="referencia[]" id="" value="Terapeuta Ocupacional">
                        <label for="">Terapeuta Ocupacional</label>
                        <br />

                        <input type="checkbox" name="referencia[]" id="" value="Fonoaudiólogo">
                        <label for="">Fonoaudiólogo</label>
                        <br />

                        <input type="checkbox" name="referencia[]" id="" value="Assistente Social">
                        <label for="">Assistente Social</label>
                        <br />

                        <input type="checkbox" name="referencia[]" id="" value="Nenhum">
                        <label for="">Nenhum</label>
                        <br />
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-10">
                    <label for="">Atendimento Externo</label>
                    <textarea class="form-control" name="atend_externo" id="atend_externo" cols="30" rows="3"></textarea>
                </div>          
            </div>

            <div class="form-row">
                <div class="form-group col-5">
                    <label for="">CRIES</label>
                    <div class="ScrollChk">
                        <input type="checkbox" name="cries[]" id="" value="Fonoaudiologia">
                        <label for="">Fonoaudiologia</label>
                        <br />

                        <input type="checkbox" name="cries[]" id="" value="Psicologia">
                        <label for="">Psicologia</label>
                        <br />

                        <input type="checkbox" name="cries[]" id="" value="TO">
                        <label for="">TO</label>
                        <br />

                        <input type="checkbox" name="cries[]" id="" value="Serviços Sociais">
                        <label for="">Serviços Sociais</label>
                        <br />

                        <input type="checkbox" name="cries[]" id="" value="Nenhum">
                        <label for="">Nenhum</label>
                        <br />
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="">CRIES (Observações)</label>
                    <textarea class="form-control" name="desc_cries" id="desc_cries" cols="30" rows="3"></textarea>
                </div>          
            </div>
        
            <div class="form-row">
                <div class="form-check col-10">
                <input type="hidden" name="sala_recursos" value="0">                    
                    <input type="checkbox" class="" id="sala_recursos" name="sala_recursos" value="1" onclick="desc_recursos()">
                    <label class="" for="">Sala de Recursos</label>
                </div>          
            </div>
    
            <div class="form-row" id="div_sala_recursos">
                <div class="form-group col-10">
                    <label for="">Sala de Recursos (Observações)</label>
                    <textarea class="form-control" name="desc_sala_recursos" id="desc_sala_recursos" cols="30" rows="3"></textarea>
                </div>          
            </div>
    
        
            
            <!-- FINAL - Suporte necessario ao aluno -->
            <hr>
            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
            <br>
            <br>

        </form>
    
    </div> <!-- Fim div container -->
@endsection
</body>
</html>