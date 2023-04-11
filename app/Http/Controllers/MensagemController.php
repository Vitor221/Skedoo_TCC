<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MensagemController extends Controller
{
    public function mensagem() {
        return view('telas.mensagem');
    }
}
