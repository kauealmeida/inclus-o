<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Aluno;
use App\view_aluno;
use App\Necessidades_especiai;
use PDF;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function escola()
    {        
        $aluno = view_aluno::all();
        return view('home_escola', compact('aluno'));
    }

    public function too()
    {        
        $aluno = view_aluno::all();
        return view('home_too', compact('aluno'));
    }

    public function pdf($id)
    {
        $aluno = view_aluno::find($id);
        return view('aluno_pdf', \compact('aluno'));
        	/* // pass view file
            $pdf = PDF::loadView('aluno_pdf', compact('aluno'))->setPaper('a4');
            // download pdf
            return $pdf->download('alunoRA'.$aluno->RA.'.pdf'); */
        
    }
    public function relatorio_geral()
    {
        $necessidades = Necessidades_especiai::all();
        $Data = DB::table('view_alunos')
        ->select(DB::raw('count(desc_necessidades) as value, desc_necessidades as name'))
        ->groupBy('desc_necessidades')
        ->get();
        return view('relatorio.geral',compact('Data', 'necessidades'));
        
    }

    public function necessidades(Request $request){
        $selecao = $request->get('SelNecessidade');

        $aluno = DB::table('view_alunos')
            ->select('nome_escolas', 'desc_necessidades', DB::raw('COUNT(desc_necessidades) as total'))
            ->where('desc_necessidades', $selecao)
            ->groupby('nome_escolas', 'desc_necessidades')
            ->get();

        return view('relatorio.necessidades', compact('aluno'));
    }
}
