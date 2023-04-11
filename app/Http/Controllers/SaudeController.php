<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaudeController extends Controller
{
    public function saude() {
        return view('telas.saude');
    }

    public function problemassaude() {
        return view('telas.problemassaude');
    }
}
