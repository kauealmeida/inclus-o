<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escola;
use App\Bairro;

class EscolaController extends Controller
{
    public function index()
    {
        $escola = Escola::all();
        $escola2 = Escola::all();
        $bairro = Bairro::all();
        $bairro2 = Bairro::all();
        return view('escolas.index', compact('escola','escola2', 'bairro', 'bairro2'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        if ($request->get('nome_escolas') != null) {
            $escola = new Escola([
                'nome_escolas' => $request->get('nome_escolas'),           
            ]);
            $escola -> save();
        }else if ($request->get('nome_bairros') != null) {
            $bairro = new Bairro([
                'nome_bairros' => $request->get('nome_bairros'),           
            ]);
            $bairro -> save();
        }        
        return redirect('/cadastrar_escola-bairro')->with('success','A escola foi cadastrado com sucesso!');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $escola = Escola::find($id);
        $escola->nome_escolas = $request->get('nome_escolas');
        $escola -> save();
        return redirect('/cadastrar_escola')->with('success','A escola foi atualizada com sucesso!');
    }
    public function destroy($id)
    {
        $escola  = Escola::find($id);
        $escola->delete();
        return redirect('/cadastrar_escola-bairro')->with('success','A escola foi deletada com sucesso!');
    }
}
