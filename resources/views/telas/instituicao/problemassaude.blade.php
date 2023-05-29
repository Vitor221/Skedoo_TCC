@extends('layouts.telas', ['title'=>'Saude'], ['nometela' => 'Problemas de Saúde'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
@endsection

@section('voltar')
<x-button-back href="{{ route('instituicao') }}" icon="uil uil-estate" />
@endsection

@section('nav-telas')
<div class="nav">
    <img id="logo-skedoo" src="{{ asset('../img/Skedoo.png') }}" alt="">
    <h4 id="data-atual">{{ \Carbon\Carbon::now(new DateTimeZone('America/Sao_Paulo'))->format('d/m/Y') }}</h4>
    <div class="perfil-bg">
        <h3>
            Bem-vindo, {{ session('login')['nm_login'] }}
            <a href="{{ route('instituicao.perfil') }}">
                @if($login->img_perfil)
                    <img name="image" class="img-perfil" class="img-personalizado" src="{{ url('storage/' . $login->img_perfil) }}" alt="">
                @else
                    <img name="image" class="img-perfil" src="https://i.stack.imgur.com/Bzcs0.png" alt="">
                @endif
            </a>
        </h3>
    </div>
</div>
@endsection

@section('content')
<div class="div-conteudo">

    <div style="background-color: white;border-radius: 2em;padding:3em;">
        <h2 style="color:#6aa39e;">Indique o problema de saúde de determinado aluno.</h2>
        <form action="">
            <div class="grupo_input">
                <div class="input_box">
                    <label>Nome do Aluno</label>
                    <input type="text">
                </div>
                
                <div class="input_box">
                    <label>Tipos de Problema</label>
                    <select class="dropdown" name="tipos" id="tipos">
                        <option class="opcao" value="0">Selecione...</option>
                            <option class="opcao" value="cardiaco">Cardíaco</option>
                            <option class="opcao" value="respiratorio">Respiratório</option>
                            <option class="opcao" value="alergico">Alérgico</option>
                            <option class="opcao" value="outro">Outro</option>
                          </select>
                        </div>
                        
                        <div class="input_box">
                            <label>Nome do Problema</label>
                            <input id="input-cel" type="text">
                        </div>
                    </div>
                    
                    <div class="input_box">
                        <label id="label_duv">Descrição do Problema e Cuidados</label>
                        <textarea name="" id="textarea_div" cols="30" rows="10"></textarea>
                    </div>
                    
                    
                    <div class="botao_envio">
                        <button type="submit">Enviar</button>
                    </div>
                </form>
    </div>
    
</div>
    @endsection