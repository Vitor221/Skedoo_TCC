<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfissionalController extends Controller
{
    public function __construct()
    {
        $this->middleware('loginAccess2')->except('logoutLogin', 'index');
    }

    public function profissional()
    {
        $cd_acesso = session()->get('login.cd_acesso');

        if (session()->has('login') && $cd_acesso == 2) {
            return view('login_pags.profissional');
        } else {
            abort(403, 'Acesso Negado!');
        }

        return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
    }
}
