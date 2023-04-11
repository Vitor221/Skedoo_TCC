<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransporteController extends Controller
{
    public function transporte() {
        return view('telas.transporte');
    }
}
