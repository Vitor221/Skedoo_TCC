<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    public function index() {
        if(session()->has('login')){
            return view('login_pags.instituicao');
        } else {
            return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
        }
        
    }
}
