<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColaboradoresController extends Controller
{
    public function colaborador() {
        return view('telas.colaborador');
    }
}
