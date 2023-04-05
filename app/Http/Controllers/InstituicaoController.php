<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('loginAccess');   
    }
    
    public function index()
    {
        if (session()->has('login')) {
            return view('login_pags.instituicao');
        }
        return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
    }
}
