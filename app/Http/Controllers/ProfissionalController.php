<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfissionalController extends Controller
{
    public function profissional()
    {
        if (session()->has('login')) {
            return view('login_pags.profissional');
        }
        return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
    }
}
