<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bairro;

class BairroController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $bairro = new Bairro([
            'nome_bairros' => $request->get('nome_bairros'),           
        ]);
        $bairro -> save();

        return redirect('/cadastrar_escola-bairro')->with('success','o Bairro foi cadastrado com sucesso!');
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
        $bairro = Bairro::find($id);
        $bairro->nome_bairros = $request->get('nome_bairros');
        $bairro -> save();
        return redirect('/cadastrar_escola-bairro')->with('success','O Bairro foi atualizado com sucesso!');
    }
    public function destroy($id)
    {
        $bairro  = Bairro::find($id);
        $bairro->delete();
        return redirect('/cadastrar_escola-bairro')->with('success','O Bairro foi deletado com sucesso!');
    }
}
