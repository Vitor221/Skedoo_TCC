<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\TbAluno;
use App\Models\TbInstituicao;
use App\Models\TbTurma;
use App\Models\TbLogin;
use App\Models\TbResponsavel;
use Illuminate\Support\Facades\Storage;

class EducadorController extends Controller
{
    public function __construct()
    {
        $this->middleware('loginAccess2')->except('logoutLogin', 'index');
    }

    public function educador()
    {
        $cd_acesso = session()->get('login.cd_acesso');
        $login = TbLogin::find(session('login'))->first();

        if (session()->has('login') && $cd_acesso == 2) {
            return view('login_pags.educador', ['login' => $login]);
        } else {
            return redirect()->back();
        }

        return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
    }

    public function mensagem(){
        $TbInstituicao = TbInstituicao::all();
        $TbResponsaveis = TbResponsavel::all();
        $login = TbLogin::find(session('login'))->first();
        return view('telas.educador.mensagem',['TbInstituicao'=>$TbInstituicao, 'login'=>$login, 'TbResponsaveis'=>$TbResponsaveis]);
    }

    public function calendario() {
        $login = TbLogin::find(session('login'))->first();
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

        return view('telas.educador.calendario', ['eventos'  =>  $eventos, 'login' => $login]);

    }
    

    
    public function aluno() {
        $TbAluno = TbAluno::all();
        $TbTurma = TbTurma::all();
        $login = TbLogin::find(session('login'))->first();

        return view('telas.educador.alunos',['TbAluno'=>$TbAluno, 'TbTurma'=>$TbTurma, 'login' => $login]); 
    }
    public function saude() {
        return view('telas.educador.saude');
    }
    public function ajuda() {
        $login = TbLogin::find(session('login'))->first();
        return view('telas.educador.ajuda', ['login' => $login]);
    }

    public function perfil()
    {
        if (session()->has('login')) {
            $login = TbLogin::find(session('login'))->first();
            return view('telas.educador.perfil', compact('login'));
        }
        return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
    }

    public function atualizarPerfil(Request $request) {
        $request->validate([
            'image' =>  'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $login = TbLogin::find(session('login'))->first();
    
        if($login->img_perfil) {
            Storage::disk('public')->delete($login->img_perfil);
        }

        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('storage', 'public');
            $login->img_perfil = $imagePath;    
            $login->save();
        }

        
        
        return view('telas.educador.perfil', ['login' => $login]);
    }
}
