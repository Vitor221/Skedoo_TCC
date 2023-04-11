<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceirosController extends Controller
{
    public function financeiro() {
        return view('telas.financeiro');
    }
}
