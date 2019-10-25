
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
        body{
            background-color: white;
            font-size: 30px;
        }
        p{
            word-wrap: break-word;
        }

        @media print
        {
           @page {
             margin-top: 0;
             margin-bottom: 0;
         }
         body  {
             padding-top: 72px;
             padding-bottom: 72px ;
         }
     } 
 </style>    

 <script>
        //script de impreção do aluno
        /* function imprimirFolha(){
            
        } */

        window.onload = function(){
            window.print();
            var tab = window.open("","_self");
            tab.close();
        }
    </script>
</head>
<body>
    <h1>Inclusão</h1>

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
</body>
</html>