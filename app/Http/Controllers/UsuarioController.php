<?php

//Classe de registro alternativa a criada automaticamente, criada devido a necessidade
//de customizar o registro.

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\View_user;
use App\Escola;

class UsuarioController extends Controller
{
   
    public function index()
    {
        $user = View_user::all();
        
        return view('usuarios.index', compact('user'));
    }

    public function create()
    {
        $escola = Escola::all();
        return view ('usuarios.create', compact('escola'));
    }

    public function store(Request $request)
    {
        $usuario = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request['password']),
            'nivel_acesso' => $request->get('nivel_acesso'),
            'fk_users_escolas' => $request->get('fk_users_escolas'),
        ]);
        $usuario -> save();
        return redirect('/registrar');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = View_user::find($id);
        $escola = Escola::all();

        /* $arr = DB::select('SELECT nome_escolas FROM escolas a LEFT JOIN users b ON a.id_escolas = b.fk_users_escolas where b.id ='.$id);
        foreach($arr as $arr){
            $nomeEscola = $arr->nome_escolas;
        } */
        return view('usuarios.edit', compact('user', 'escola'));

    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->nivel_acesso = $request->get('nivel_acesso');

        //trecho utlizado para apagar a o campo escola caso ela deixe de ser selecionada
        if($request->get('nivel_acesso') == "Escola"){
        $user->fk_users_escolas = $request->get('fk_users_escolas');
            $user->fk_users_escolas = $request->get('fk_users_escolas');
        }else {
            $user->fk_users_escolas = null;
        }
        
        $user -> save();
        return redirect('/registrar')->with('success','Atualização realizada com sucesso!');

    }

    public function destroy($id)
    {
        //
    }
}
