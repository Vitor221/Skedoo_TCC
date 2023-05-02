<?php

namespace App\Http\Controllers;
use App\Models\TbResponsavel;
use App\Models\TbAluno;
use App\Models\TbUf;
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
        return view('telas.instituicao.clientes',['TbResponsaveis'=>$TbResponsaveis]); 
    }
    public function deletar_cliente($id){
        $responsavel = TbResponsavel::findOrFail($id);
        $responsavel->tb_responsavel_aluno()->delete();
        $responsavel->tb_aluno()->delete();
        $responsavel->tb_contato()->delete();
        $responsavel->tb_login()->delete();
        $responsavel->delete();
        $responsavel->tb_endereco()->delete();
        return back()->with('success','Responsavel deletado com sucesso.');
    }
    public function vizualizar_cliente($id){
        $responsavel = TbResponsavel::findOrFail($id);
        $endereco = $responsavel->tb_endereco;
        return view('telas.instituicao.visualizar_cliente', compact('responsavel', 'endereco'));
    }
    public function editar_cliente($id) {
        $responsavel = TbResponsavel::findOrFail($id);
        $endereco = $responsavel->tb_endereco;
        return view('telas.instituicao.editar_cliente', compact('responsavel', 'endereco'));
    }
    public function update_cliente(Request $request, $id) {
        $data = [
            'nm_responsavel'  =>  $request->name,
            'cd_cpf'   =>  $request->cpf,
        ];

        TbResponsavel::where('cd_responsavel', $id)->update($data);

        return redirect()->route('instituicao.clientes');
    }
}
