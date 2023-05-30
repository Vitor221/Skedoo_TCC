<?php

namespace App\Http\Controllers;

use Illuminate\HttpRequ\est;
use App\Models\Event;
use App\Models\TbCardapio;
use Carbon\Carbon;
use App\Models\TbInstituicao;
use App\Models\TbLogin;
use Illuminate\Support\Facades\Storage;
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
        $login = TbLogin::find(session('login'))->first();
        
        if (session()->has('login') && $cd_acesso == 3) {
            return view('login_pags.responsavel', ['login' => $login]);
        } else {
            return redirect()->back();
        }
        
        return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
    }

    public function ajuda() {
        $login = TbLogin::find(session('login'))->first();
        return view('telas.responsavel.ajuda', ['login' => $login]);
    }

    public function saude() {
        $login = TbLogin::find(session('login'))->first();
        return view('telas.responsavel.saude', ['login' => $login]);
    }

    public function mensagem(){
        $TbInstituicao = TbInstituicao::all();
        return view('telas.responsavel.mensagem',['TbInstituicao'=>$TbInstituicao]);
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

        return view('telas.responsavel.calendario', ['eventos'  =>  $eventos, 'login' => $login]);
    }
    
    public function transporte() {
        return view('telas.responsavel.transporte');
    }

    public function refeicao() {
        $login = TbLogin::find(session('login'))->first();
        return view('telas.responsavel.refeicao', ['login' => $login]);
    }

    public function visualizar_cardapio(){
        $login = TbLogin::find(session('login'))->first();
        $cardapio = TbCardapio::all();
        $dataAtual = Carbon::now()->format('Y-m-d');
        $TbCardapio = TbCardapio::orderBy('dt_cardapio', 'asc')->where('dt_cardapio','>', $dataAtual)->get();
        $cardapioAnterior = TbCardapio::orderBy('dt_cardapio', 'asc')->where('dt_cardapio','<', $dataAtual)->get();
        $cardapioHoje = TbCardapio::where('dt_cardapio', $dataAtual)->first();
        return view('telas.responsavel.refeicao', ['TbCardapio'=>$TbCardapio, 'cardapioHoje'=>$cardapioHoje, 'cardapioAnterior'=>$cardapioAnterior,'cardapio'=>$cardapio, 'login' => $login]);
    }

    public function perfil()
    {
        if (session()->has('login')) {
            $login = TbLogin::find(session('login'))->first();
            return view('telas.responsavel.perfil', compact('login'));
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

        
        
        return view('telas.responsavel.perfil', ['login' => $login]);
    }
}
