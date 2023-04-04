<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index() {
        //Se existir uma sessão (conta logada), a página irá ser redirecionada para a página home da instituicao/responsavel/professor
        if(session()->has('login')){
            return redirect()->route('instituicao');
        } else { //Se não existir sessão, irá para a página de login
            return view('login');
        }
    }

    public function autenticarLogin(Request $request){
        $request->validate([
            'nm_login'  =>  'required',
            'cd_senha'  =>  'required'
        ], [
            'nm_login.required' =>  'Campo login é obrigatório!',
            'cd_senha.required' =>  'Campo senha é obrigatório!'
        ]);

        $login = $request->input('nm_login'); //Armazenando o valor dos inputs na variável login
        $senha = $request->input('cd_senha'); //Armazenando o valor dos inputs na variável senha

        $usuario = DB::table('tb_login')->where('nm_login', $login)->first(); //Pegar todos os dados no nm_login que foi digitado no input

        if($usuario && $usuario->cd_senha === $senha){ //Se tiver todos os dados do usuário pesquisado e a senha do usuário for igual a senha do banco de dados.
            session()->put('login', $usuario);
            return redirect()->route('instituicao');
        } else {
            return redirect()->back()->with('erro', 'Usuário ou senha inválido');
        }
    }

    public function logoutLogin() {
        session()->forget('login');
        return redirect()->route('login_pag');
    }
}
