<?php

namespace App\Http\Controllers;
use App\Models\TbResponsavel;
use App\Models\TbAluno;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('loginAccess')->except('logoutLogin', 'index');
    }
    
    public function index()
    {
        $cd_acesso = session()->get('login.cd_acesso');

        if (session()->has('login') && $cd_acesso == 1) {
            return view('login_pags.instituicao');
        } else {
            return redirect()->back();
        }

        return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
    }
    public function saude() {
        return view('telas.instituicao.saude');
    }

    public function problemassaude() {
        return view('telas.instituicao.problemassaude');
    }
    public function cliente(){
      
        $TbResponsaveis = TbResponsavel::paginate(6);

        return view('telas.instituicao.clientes',['TbResponsaveis'=>$TbResponsaveis]); 
    }

    public function aluno(){
      
        $TbAluno = TbAluno::all();

        return view('telas.instituicao.alunos',['TbAluno'=>$TbAluno]); 
    }
    public function ajuda(){
        return view('telas.instituicao.ajuda');
    }
    public function mensagem(){
        return view('telas.instituicao.mensagem');
    }
    public function colaborador(){
        return view('telas.instituicao.colaborador');
    }
    public function configuracoes(){
        return view('telas.instituicao.configuracoes');
    }
    public function financeiro(){
        return view('telas.instituicao.financeiro');
    }
    public function transporte(){
        return view('telas.instituicao.transporte');
    }
    public function calendario(){
        return view('telas.instituicao.calendario');
    }
    public function refeicao(){
        return view('telas.instituicao.refeicao');
    }

    public function store(Request $request){
        $responsavel = new TbResponsavel();
        $responsavel->nm_responsavel = $request->name;
        $responsavel->cd_cpf = $request->cpf;
        $responsavel->save();
        $TbResponsaveis = TbResponsavel::paginate(6);
        return view('telas.instituicao.clientes',['TbResponsaveis'=>$TbResponsaveis]); 
    }
    public function delete($id){
        $responsavel = TbResponsavel::findOrFail($id);
        $responsavel->tb_alunos()->delete();
        $responsavel->tb_contatos()->delete();
        $responsavel->tb_logins()->delete();
        $responsavel->delete();
        return back()->with('success','Responsavel deletado com sucesso.');
    }
}
