<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function perfilInstituicao()
    {
        if (session()->has('login')) {
            return view('perfil');
        }
        return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
    }

    public function perfilResponsavel()
    {
        if (session()->has('login')) {
            return view('perfil');
        }
        return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
    }

    public function perfilEducador()
    {
        if (session()->has('login')) {
            return view('perfil');
        }
        return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
    }
}
