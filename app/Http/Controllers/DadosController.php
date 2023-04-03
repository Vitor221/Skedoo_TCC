<?php

namespace App\Http\Controllers;

use App\Models\Responsavel;
use Illuminate\Http\Request;

class DadosController extends Controller
{
    // public utilizada no DadosControllers
    public function cliente(){
      
        $tb_responsavel = Responsavel::all();
        dd($tb_responsavel);
        // Chamando a View/blade
        return view('clientes'); 
    }

}
