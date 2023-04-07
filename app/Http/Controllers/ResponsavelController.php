<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponsavelController extends Controller
{
    public function __construct()
    {
        $this->middleware('loginAccess3')->except('logoutLogin', 'index');
    }

    public function responsavel()
    {
        $cd_acesso = session()->get('login.cd_acesso');

        if (session()->has('login') && $cd_acesso == 3) {
            return view('login_pags.responsavel');
        } else {
            abort(403, 'Acesso Negado!');
        }
        
        return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
    }
}
