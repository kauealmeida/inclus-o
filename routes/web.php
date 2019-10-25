<?php

Route::get('/', function () {
    return view('index');
});

Auth::routes();
Auth::routes(['register' => false]); //bloqueia a rota padrão de registro criada pelo laravel

Route::group(['middleware' => ['web','auth']], function(){
//Rota inicial, verifica para qual home enviar quem esta logando no sistema
Route::get('/home', function() {
    if (Auth::user()->nivel_acesso == "Admin") {
      return view('home_admin');
    } else if(Auth::user()->nivel_acesso == "Escola"){
        echo("escola");
      return redirect('/escolas');
    } else{
      return redirect('/too');
    }
  });
//Rota para cadastro de alunos (apenas admin tem acesso a ela)
Route::resource ('inclusao', 'AlunosController')->middleware('admin');

Route::get('/escolas', 'HomeController@escola');

Route::get('/too', 'HomeController@too');

//Rota para registro das escolas (apenas admin tem acesso a ela)
Route::resource ('registrar', 'UsuarioController')->middleware('admin');

Route::get('/cadastrar_escola-bairro', 'EscolaController@index')->middleware('admin');
Route::resource('cadastrar_escola', 'EscolaController')->middleware('admin');
Route::resource('cadastrar_bairro', 'BairroController')->middleware('admin');

Route::get('aluno/pdf/{id}', 'HomeController@pdf')->name('aluno.pdf');

//Rotas para relatorios
Route::get("/relatorios", "HomeController@relatorio_geral");
//Route::get("/filtro_necessidades", "HomeController@necessidades");
Route::get('/filtro_necessidades/{id}', 'HomeController@necessidades')->name('filtro_necessidades.pdf');

});