<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponsavelController extends Controller
{
    public function index() {
        return view('login_pags.responsavel');
    }
}
