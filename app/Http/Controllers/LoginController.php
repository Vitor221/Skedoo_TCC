<?php

namespace App\Http\Controllers;

use App\Models\TbLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        //Se existir uma sessão (conta logada), a página irá ser redirecionada para a página home da instituicao/responsavel/professor
        if (session()->has('login')) {
            return redirect()->route('instituicao');
        }
        //Se não existir sessão, irá para a página de login
        return view('login');
    }

    public function autenticarLogin(Request $request)
    {
        $data = $request->validate([
            'nm_login'  =>  'required',
            'cd_senha'  =>  'required',
        ], [
            'nm_login.required' =>  'Campo login é obrigatório!',
            'cd_senha.required' =>  'Campo senha é obrigatório!'
        ]);

        $usuario = TbLogin::where('nm_login', $data['nm_login'])->where('cd_senha', $data['cd_senha'])->first();

        if ($usuario) { //Se tiver todos os dados do usuário pesquisado e a senha do usuário for igual a senha do banco de dados.
            session()->put('login', $usuario);

            if($usuario['cd_acesso'] == 1){
                return redirect()->route('instituicao');
            }

            if($usuario['cd_acesso'] == 2) {
                return redirect()->route('educador');
            }

            if($usuario['cd_acesso'] == 3) {
                return redirect()->route('responsavel');
            }
        } else {
            return redirect()->route('login_pag')->withErrors(['mensagem' => 'Login e/ou Senha inválidos']);
        }
    }

    public function logoutLogin()
    {
        session()->forget('login');
        return redirect()->route('login_pag');
    }
}
