<?php

namespace App\Http\Controllers;

use Illuminate\HttpRequ\est;
use App\Models\Event;
use App\Models\TbCardapio;
use Carbon\Carbon;

class ResponsavelController extends Controller
{
    public function __construct()
    {
        $this->middleware('loginAccess3')->except('logoutLogin', 'index');
    }

    public function responsavel()
    {
        $cd_acesso = session()->get('login.cd_acesso');

        if (session()->has('login') && $cd_acesso == 3) {
            return view('login_pags.responsavel');
        } else {
            return redirect()->back();
        }
        
        return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
    }

    public function ajuda() {
        return view('telas.responsavel.ajuda');
    }

    public function saude() {
        return view('telas.responsavel.saude');
    }

    public function mensagem() {
        return view('telas.responsavel.mensagem');
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

        return view('telas.responsavel.calendario', ['eventos'  =>  $eventos]);
    }
    
    public function transporte() {
        return view('telas.responsavel.transporte');
    }

    public function refeicao() {
        return view('telas.responsavel.refeicao');
    }

    public function visualizar_cardapio(){
        $cardapio = TbCardapio::all();
        $dataAtual = Carbon::now()->format('Y-m-d');
        $TbCardapio = TbCardapio::orderBy('dt_cardapio', 'asc')->where('dt_cardapio','>', $dataAtual)->get();
        $cardapioAnterior = TbCardapio::orderBy('dt_cardapio', 'asc')->where('dt_cardapio','<', $dataAtual)->get();
        $cardapioHoje = TbCardapio::where('dt_cardapio', $dataAtual)->first();
        return view('telas.responsavel.refeicao', ['TbCardapio'=>$TbCardapio, 'cardapioHoje'=>$cardapioHoje, 'cardapioAnterior'=>$cardapioAnterior,'cardapio'=>$cardapio]);
    }
}
