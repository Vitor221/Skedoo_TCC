<?php

namespace App\Http\Controllers;

use App\Models\TbResponsavel;
use App\Models\TbAluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DadosController extends Controller
{
    // public utilizada no DadosControllers
    public function cliente(){
      


        $TbResponsavel = TbResponsavel::all();
        // dd($TbResponsavel);
        // Chamando a View/blade
        

        return view('telas.clientes',['TbResponsavel'=>$TbResponsavel]); 
    }

    public function aluno(){
      


        $TbAluno = TbAluno::all();
        // dd($TbResponsavel);
        // Chamando a View/blade
        

        return view('telas.alunos',['TbAluno'=>$TbAluno]); 
    }


}
