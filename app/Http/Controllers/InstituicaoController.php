<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    public function index() {
        return view('login_pags.instituicao');
    }
}
