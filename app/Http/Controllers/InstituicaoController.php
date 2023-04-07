<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('loginAccess')->except('logoutLogin', 'index');
    }
    
    public function index()
    {
        $cd_acesso = session()->get('login.cd_acesso');

        if (session()->has('login') && $cd_acesso == 1) {
            return view('login_pags.instituicao');
        } else {
            abort(403, 'Acesso Negado!');
        }

        return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
    }
}
