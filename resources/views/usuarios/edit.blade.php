@extends('layouts.app')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!--Comentar -->
    <script> 
            window.onload = function(){
                document.getElementById("div_escola").style.display = "none";
                document.getElementById("mensagem_escola").style.display = "none";
                sel_escola();
            }       
            function sel_escola(){
                var SelEscola = document.getElementById("nivel_acesso").value;
                var div_escola = document.getElementById("div_escola");
                var req_escola = document.getElementById("fk_users_escolas"); 
    
                if(SelEscola == "Escola"){
                    document.getElementById("mensagem_escola").style.display = "block";
                    div_escola.style.display = "block";
                    req_escola.required = true;
                }else{
                    document.getElementById("mensagem_escola").style.display = "none";
                    div_escola.style.display = "none";
                    req_escola.required = false;
                }        
            }
        </script>

</head>
<body>
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Registrar Usuário') }}</div>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('registrar.update', $user->id) }}">
                                @csrf
                                @method('PATCH')
        
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
        
                                    <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>        
                                

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Nível de Acesso</label>        
                                    <div class="col-md-6">
                                        <select class="form-control" name="nivel_acesso" id="nivel_acesso" required onclick="sel_escola()">
                                            <option value="{{$user->nivel_acesso}}">{{$user->nivel_acesso}}</option>
                                            <option style="font-size: 1pt; background-color: #000000;" disabled>&nbsp;</option>
                                            <option value="Admin">Administrador</option>
                                            <option value="TOO">TOO</option>
                                            <option value="Escola">Escola</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4" id="mensagem_escola"><p>*Escolha o nome da escola</p></div>

                                <div id="div_escola">
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right" id="lb_escola">Escola</label>        
                                        <div class="col-md-6" >
                                            <select class="form-control" name="fk_users_escolas" id="fk_users_escolas">
                                                <option value="{{$user->fk_users_escolas}}">{{$user->nome_escolas}}</option>
                                                <option style="font-size: 1pt; background-color: #000000;" disabled>&nbsp;</option>
                                                @foreach($escola as $escola)
                                                <option value="{{$escola->id_escolas}}">{{$escola->nome_escolas}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Registrar') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
        

    
</body>
</html>

