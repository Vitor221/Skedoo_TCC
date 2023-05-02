<?php

namespace App\Http\Controllers;
use App\Models\TbResponsavel;
use App\Models\TbAluno;
use App\Models\TbUf;
use App\Models\TbTurma;
use App\Models\TbEndereco;
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
        $TbTurmas = TbTurma::all();
        return view('telas.instituicao.clientes',['TbResponsaveis'=>$TbResponsaveis, 'TbTurmas'=>$TbTurmas]); 
    }

    public function aluno(){
      
        $TbAluno = TbAluno::all();
        $TbTurma = TbTurma::all();

        return view('telas.instituicao.alunos',['TbAluno'=>$TbAluno, 'TbTurma'=>$TbTurma]); 
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

    public function inserir_cliente(Request $request){
        $responsavel = new TbResponsavel();
        $responsavel->nm_responsavel = $request->name;
        $responsavel->cd_cpf = $request->cpf;
        $cadastro = $responsavel->tb_cadastro()->create(['nm_login'=>'teste', 'cd_senha'=>'teste']);
        $responsavel->cd_cadastro = $cadastro->cd_cadastro;
        $uf = TbUf::find($request->uf);
        $cidade = $uf->tb_cidade()->firstOrCreate(['nm_cidade' => $request->cidade]);
        $bairro = $cidade->tb_bairro()->firstOrCreate(['nm_bairro' => $request->bairro, 'cd_cidade' => $cidade->cd_cidade]);
        $endereco =$bairro->tb_endereco()->create(['cd_cep' => $request->cep,'cd_numcasa' => $request->num,'nm_endereco' => $request->logradouro,'ds_complemento' => $request->complemento,  'cd_bairro' => $bairro->cd_bairro]);
        $responsavel->cd_endereco = $endereco->cd_endereco;
        $responsavel->save();
        $TbResponsaveis = TbResponsavel::paginate(6);
        return back()->with('success', 'Responsavel cadastrado com sucesso!'); 
    }
    public function deletar_cliente($id){
        $responsavel = TbResponsavel::findOrFail($id);
        $enderecoCount = TbResponsavel::all()->where('cd_endereco', '=', $responsavel->cd_endereco)->count();
        $responsavel->tb_responsavel_aluno()->delete();
        $responsavel->tb_aluno()->delete();
        $responsavel->tb_contato()->delete();
        $responsavel->tb_login()->delete();
        $responsavel->delete();
        if($enderecoCount == 1){
            $responsavel->tb_endereco()->delete();
        }
        return view('telas.instituicao.clientes');
    }
    public function visualizar_cliente($id){
        $responsavel = TbResponsavel::findOrFail($id);
        $endereco = $responsavel->tb_endereco;
        $aluno = $responsavel->tb_aluno[0];
        return view('telas.instituicao.visualizar_cliente', compact('responsavel', 'endereco', 'aluno'));
    }
    public function inserir_aluno(Request $request){
        $aluno = new TbAluno();
        $aluno->nm_aluno = $request->nomeAluno;
        $aluno->cd_turma = $request->turma;
        if($request->ps == 1){
            $aluno->se_problema_saude = $request->ps;
            $aluno->ds_problema_saude = $request->descricaoPS;
            $aluno->nm_problema_saude = $request->nomePS;
            $aluno->nm_tipo_ps = $request->tipos;
        }
        $aluno->save();
        $TbTurma = TbTurma::all();
        $TbAluno = TbAluno::all();
        return view('telas.instituicao.alunos', ['TbTurma'=>$TbTurma, 'TbAluno'=>$TbAluno]); 
    }
    public function deletar_aluno($id){
        $aluno = TbAluno::findOrFail($id);
        $aluno->delete();
        $TbTurma = TbTurma::all();
        $TbAluno = TbAluno::all();
        return view('telas.instituicao.alunos', ['TbTurma'=>$TbTurma, 'TbAluno'=>$TbAluno]); 
    }
    public function inserir_turma(Request $request){
        $turma = new TbTurma();
        $turma->nm_turma = $request->nomeTurma;
        $turma->sg_turma = $request->sigla;
        if($request->periodo == "M"){
            $turma->ds_periodo = "Manhã";
        }else if($request->periodo == "T"){
            $turma->ds_periodo = "Tarde";
        }else {
            $turma->ds_periodo = "Integral";
        }
        $turma->save();
        $TbTurma = TbTurma::all();
        $TbAluno = TbAluno::all();
        return view('telas.instituicao.alunos', ['TbTurma'=>$TbTurma, 'TbAluno'=>$TbAluno]); 
    }
    public function deletar_turma($id){
        $TbTurma = TbTurma::all();
        $TbAluno = TbAluno::all();
        $turma = TbTurma::findOrFail($id);
        $turma->delete();
        return view('telas.instituicao.alunos', ['TbTurma'=> $TbTurma, 'TbAluno'=>$TbAluno]);
    }
    public function visualizar_turma(){

    }
}
