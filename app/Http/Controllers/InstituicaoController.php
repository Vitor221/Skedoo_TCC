<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    public function index() {

        if(session()->has('login')){
            dd(session('login'));
            return view('login_pags.instituicao');
        } else {
            return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
        }
        
    }
}
