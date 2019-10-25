<?php

/* Controle responsavel pelas operações de cadastro edição e recuperação de dados (CRUD) dos alunos.
    É utilizado pelas seguintes views:
        -alunos/index.blade.php
        -alunos/cadastro.blade.php
        -alunos/editar.blade.php */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Entities\Models\User;
use App\Periodo;
use App\Serie;
use App\Turma;
use App\Necessidades_especiai;
use App\Adaptacoe;
use App\Apoio;
use App\Referencia;
use App\Escola;
use App\Aluno;
use App\view_aluno;
use App\Bairro;

class AlunosController extends Controller
{

    //Funcao chamada ao abrir a pagina com a lista de alunos cadastrados, tem a funcao de passar as variaveis para a tabela
    public function index()
    {
        //$aluno = view_aluno::all();
        $aluno = DB::table('alunos')
        ->leftjoin('escolas', 'alunos.fk_alunos_escolas', '=', 'escolas.id_escolas')
        ->select('alunos.id_alunos','alunos.nome_aluno','alunos.RA','alunos.data_nascimento','escolas.nome_escolas')
        ->get();
        return view('alunos.index', compact('aluno'));
    }

    //Funcao chamada ao acessar a pagina de cadastro, tem a funcao de passar as variaveis para utilizacao nos selects
    public function create()
    {
        $periodo = Periodo::all();
        $serie = Serie::all();
        $turma = Turma::All();
        $necessidades = Necessidades_especiai::All();
        $escolas = Escola::all();
        $bairro = Bairro::all();
        
        return view('alunos.cadastro', compact(
            'periodo',
            'serie',
            'turma',
            'necessidades',            
            'escolas',
            'bairro'
        ));
    }

    //Funcao chamada ao clicar no botao cadastrar na pagina de cadastro, tem a funcao de criar um registro novo com os dados do formulario
    public function store(Request $request)
    {
        //INICIO - Pega as selecões dos checkbox adaptações, apoio, referencia e cries e passa para string para 
        //posteriormente ser passado ao banco.

       if($request->get('adapt')!=null){
        $Sel_adaptacoes =  $request->get('adapt');
        $STR_adaptacoes = implode(";", $Sel_adaptacoes);
        }else {
            //$STR_adaptacoes = "Não selecionado";            
            return redirect()->back()->with('error','O aluno não foi cadastrado, adaptações nao selecionado');            
        }

        if($request->get('apoio')!=null){
            $Sel_apoio = $request->get('apoio');
            $STR_apoio = implode(";",$Sel_apoio);
        }else {
            $STR_apoio = "Não selecionado";
        }
        
        if ($request->get('referencia')!=null) {
            $Sel_referencia = $request->get('referencia');
            $STR_referencia = implode(";", $Sel_referencia);
        }else {
            $STR_referencia = "Não selecionado";
        }
        
        if ($request->get('cries')!=null) {
            $Sel_cries = $request->get('cries');
            $STR_cries = implode(";", $Sel_cries);
        }else {
            $STR_cries = "Não selecionado";
        }

        //FIM

        $aluno = new Aluno([
            'nome_aluno' => $request->get('nome_aluno'),
            'data_nascimento' => $request->get('data_nascimento'),
            'RA' => $request->get('RA'),
            
            'diagnostico' => $request->get('diagnostico'),
            'EC' => $request->get('EC'),
            'PEP' => $request->get('PEP'),
            'flex_prova' => $request->get('flex_prova'),
            'cries' => $STR_cries,
            'desc_cries' => $request->get('desc_cries'),
            'sala_recursos' => $request->get('sala_recursos'),
            'desc_sala_recursos' => $request->get('desc_sala_recursos'),
            'atend_externo' => $request->get('atend_externo'),
            'detalhe_necessidades' => $request->get('detalhe_necessidades'),
            'adaptacoes' => $STR_adaptacoes,
            'adaptacoes_outros' => $request->get('adaptacoes_outros'),
            'apoio' => $STR_apoio,
            'referencia' => $STR_referencia,
            'nv_escrita' => $request->get('nv_escrita'),

            'fk_alunos_bairros' => $request->get('fk_alunos_bairros'),          
            'fk_alunos_escolas' => $request->get('fk_alunos_escolas'),
            'fk_alunos_series' => $request->get('fk_alunos_series'),
            'fk_alunos_turmas' => $request->get('fk_alunos_turmas'),
            'fk_alunos_periodos' => $request->get('fk_alunos_periodos'),
            'fk_alunos_necessidades_especiais' => $request->get('fk_alunos_necessidades_especiais'),           
        ]);

        $aluno -> save();
        return redirect('/inclusao/create')->with('success','O aluno foi cadastrado com sucesso!');
    }

    public function show($id)
    {
        //
    }

    //funcao chamada ao abrir a pagina de edicao, tem a funcao de passar os dados do registro selecionado para preencher os campos no formulario
    public function edit($id)
    {
        $aluno = view_aluno::find($id);
        $periodo = Periodo::all();
        $serie = Serie::all();
        $turma = Turma::All();
        $necessidades = Necessidades_especiai::All();
        $escolas = Escola::all();
        $bairro = Bairro::all();

        $adaptacoes = explode(";", $aluno->adaptacoes);
        $apoio = explode(";", $aluno->apoio);
        $referencia = explode(";", $aluno->referencia);
        $cries = explode(";", $aluno->cries);

        //Divide a string guardada no banco e cria um array separando cada indice por ponto e virgua
        //Usado para editar o campo necessidades sem precisar apagar, cada campo eh aprensentado no checkbox
        //para que possa ser desmarcado.
        //$teste = explode(';', $aluno->necessidades);

        return view('alunos.editar', compact(
            'periodo',
            'serie',
            'turma',
            'necessidades',
            'escolas',
            'aluno',
            'adaptacoes',
            'apoio',
            'referencia',
            'cries',
            'bairro'
        ));
    }

    //funcao chamada ao clicar no botao Salvar na pagina de edicao, ela tem a funcao de atualizar todos dados do banco referente ao registro selecionado
    public function update(Request $request, $id)
    {
        //INICIO - Pega as selecões dos checkbox adaptações, apoio, referencia e cries e passa para string para 
        //posteriormente ser passado ao banco.        
        $Sel_adaptacoes =  $request->get('adapt');
        if($Sel_adaptacoes != null){
            $STR_adaptacoes = implode(";", $Sel_adaptacoes);
        }
        $Sel_apoio = $request->get('apoio');
        if($Sel_apoio != null){
            $STR_apoio = implode(";",$Sel_apoio);
        }
        $Sel_referencia = $request->get('referencia');
        if($Sel_referencia != null){
            $STR_referencia = implode(";", $Sel_referencia);
        }
        $Sel_cries = $request->get('cries');
        if($Sel_cries != null){
            $STR_cries = implode(";", $Sel_cries);
        }
        //FIM

        $aluno = Aluno::find($id);
        $aluno->nome_aluno = $request->get('nome_aluno');
        $aluno->data_nascimento = $request->get('data_nascimento');
        $aluno->RA = $request->get('RA');
        $aluno->fk_alunos_bairros = $request->get('fk_alunos_bairros');
        $aluno->diagnostico = $request->get('diagnostico');
        $aluno->EC = $request->get('EC');
        $aluno->PEP = $request->get('PEP');
        $aluno->flex_prova = $request->get('flex_prova');
        $aluno->cries = $STR_cries;
        $aluno->desc_cries = $request->get('desc_cries');
        $aluno->sala_recursos = $request->get('sala_recursos');
        $aluno->atend_externo = $request->get('atend_externo');

        //trecho utlizado para apagar a observação da sala de recursos caso ela deixe de ser selecionada
        if($request->get('sala_recursos') == 1){
            $aluno->desc_sala_recursos = $request->get('desc_sala_recursos');
        }else {
            $aluno->desc_sala_recursos = null;
        }       

        //trecho utlizado para apagar a descrição se for alterado a necessidade "Deficiencia Multipla" para qualquer outra
        if($request->get('fk_alunos_necessidades_especiais')==5){
            $aluno->detalhe_necessidades = $request->get('detalhe_necessidades');
        }else {
            $aluno->detalhe_necessidades = null;
        }
        
        $aluno->adaptacoes = $STR_adaptacoes;
        $aluno->adaptacoes_outros = $request->get('adaptacoes_outros');
        $aluno->apoio = $STR_apoio;
        $aluno->referencia = $STR_referencia;
        $aluno->nv_escrita = $request->get('nv_escrita');
      
        $aluno->fk_alunos_escolas = $request->get('fk_alunos_escolas');
        $aluno->fk_alunos_series = $request->get('fk_alunos_series');
        $aluno->fk_alunos_turmas = $request->get('fk_alunos_turmas');
        $aluno->fk_alunos_periodos = $request->get('fk_alunos_periodos');
        $aluno->fk_alunos_necessidades_especiais = $request->get('fk_alunos_necessidades_especiais');
        
        $aluno -> save();
        return redirect('/inclusao')->with('success','Atualização realizada com sucesso!');
    }

    //funcao acionada ao clicar no botao Deletar na pagina de edicao, tem a funcao de apagar todo o registro selecionado
    public function destroy($id)
    {
        $aluno  = Aluno::find($id);
        $aluno->delete();
        return redirect('/inclusao');
    }
}
