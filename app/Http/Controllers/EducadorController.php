<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EducadorController extends Controller
{
    public function __construct()
    {
        $this->middleware('loginAccess2')->except('logoutLogin', 'index');
    }

    public function educador()
    {
        $cd_acesso = session()->get('login.cd_acesso');

        if (session()->has('login') && $cd_acesso == 2) {
            return view('login_pags.educador');
        } else {
            return redirect()->back();
        }

        return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
    }
    public function mensagem() {
        return view('telas.educador.mensagem');
    }
    public function calendario() {

        $eventos = array();
        $diasEventos = Event::all();
        foreach($diasEventos as $diaEvento) {
            $eventos[] = [
                'id'    =>  $diaEvento->id,
                'title' =>  $diaEvento->title,
                'start' =>  $diaEvento->start_event,
                'end'   =>  $diaEvento->end_event,
            ];
        }

        return view('telas.educador.calendario', ['eventos'  =>  $eventos]);

    }
    public function aluno() {
        return view('telas.educador.alunos');
    }
    public function saude() {
        return view('telas.educador.saude');
    }
    public function configuracoes() {
        return view('telas.educador.configuracoes');
    }
    public function ajuda() {
        return view('telas.educador.ajuda');
    }
}
