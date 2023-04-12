<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ControllerSkedoo extends Controller
{
    public function inicio(){
        return view('inicio');
    }
    public function perfil()
    {
        if (session()->has('login')) {
            return view('perfil');
        }
        return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
    }
}
