<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponsavelController extends Controller
{
    public function responsavel()
    {
        if (session()->has('login')) {
            return view('login_pags.responsavel');
        }
        return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
    }
}
