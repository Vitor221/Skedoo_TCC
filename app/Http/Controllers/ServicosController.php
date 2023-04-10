<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicosController extends Controller
{
    public function servicos() {
        return view('telas.servicos');
    }
}
