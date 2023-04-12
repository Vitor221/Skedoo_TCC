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
            return redirect()->back();
        }
        
        return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
    }
    public function ajuda() {
        return view('telas.responsavel.ajuda');
    }
    public function saude() {
        return view('telas.responsavel.saude');
    }
    public function configuracoes() {
        return view('telas.responsavel.configuracoes');
    }
    public function mensagem() {
        return view('telas.responsavel.mensagem');
    }
    public function calendario() {
        return view('telas.responsavel.calendario');
    }
    public function transporte() {
        return view('telas.responsavel.transporte');
    }
}
