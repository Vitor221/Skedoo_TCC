<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfissionalController extends Controller
{
    public function index() {
        return view('login_pags.profissional');
    }
}
