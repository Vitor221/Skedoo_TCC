<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ControllerSkedoo extends Controller
{
    public function inicio(){
        return view('inicio');
    }
}
