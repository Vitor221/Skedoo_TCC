<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TbCardapio;
use App\Models\TbResponsavel;
use App\Models\TbAluno;
use App\Models\TbUf;
use App\Models\TbTurma;
use App\Models\TbEndereco;
use App\Models\TbEventos;
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
        $eventos = array();
        $diasEventos = Event::all();
        foreach($diasEventos as $diaEvento) {
            $eventos[] = [
                'id'        =>      $diaEvento->id,
                'title'     =>      $diaEvento->title,
                'start'     =>      $diaEvento->start_event,
                'end'       =>      $diaEvento->end_event
            ];
        }
        return view('telas.instituicao.calendario', ['eventos' => $eventos]);
    }

    public function calendarioStore(Request $request) {
        $request->validate([
            'title' =>  'required|string',
        ]);
        
        $calendario = Event::create([
            'title'         =>  $request->title,
            'start_event'   =>  $request->start_event,
            'end_event'     =>  $request->end_event,
        ]);

        return response()->json($calendario);
    }

    public function calendarioUpdate(Request $request, $id) {
        $calendario = Event::find($id);
        if(! $calendario) {
            return response()->json([
                'error' =>  'Não foi localizado o evento'
            ], 404);
        }

        $calendario->update([
            'start_event'   =>  $request->start_event,
            'end_event'     =>  $request->end_event,
        ]);

        return response()->json('Event updated');
    }

    public function calendarioDelete($id)
    {
        $calendario = Event::find($id);
        if(! $calendario) {
            return response()->json([
                'error' => 'Não foi localizado o evento'
            ], 404);
        }

        $calendario->delete();

        return $id;
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
        $aluno = new TbAluno();
        $aluno->nm_aluno = $request->nomeAluno;
        $aluno->cd_turma = $request->turma;
        if($request->ps == 1){
            $aluno->se_problema_saude = $request->ps;
            $aluno->ds_problema_saude = $request->descricaoPS;
            $aluno->nm_problema_saude = $request->nomePS;
            $aluno->nm_tipo_ps = $request->tipos;
        }
        $aluno->cd_responsavel = $responsavel->cd_responsavel;
        $aluno->save();
        $TbResponsaveis = TbResponsavel::paginate(6);
        return back()->with('success', 'Responsavel cadastrado com sucesso!'); 
    }
    public function deletar_cliente($id){
        $responsavel = TbResponsavel::findOrFail($id);
        $enderecoCount = TbResponsavel::all()->where('cd_endereco', '=', $responsavel->cd_endereco)->count();
        $Turma = TbTurma::all();
        $responsavel->tb_responsavel_aluno()->delete();
        $responsavel->tb_aluno()->delete();
        $responsavel->tb_contato()->delete();
        $responsavel->tb_login()->delete();
        $responsavel->delete();
        if($enderecoCount == 1){
            $responsavel->tb_endereco()->delete();
        }
        return redirect()->route('instituicao.clientes');
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
        return redirect()->route('instituicao.alunos'); 
    }
    public function deletar_aluno($id){
        $aluno = TbAluno::findOrFail($id);
        $aluno->delete();
        $TbTurma = TbTurma::all();
        $TbAluno = TbAluno::all();
        return redirect()->route('instituicao.alunos'); 
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
        return redirect()->route('instituicao.alunos'); 
    }
    public function deletar_turma($id){
        $TbTurma = TbTurma::all();
        $TbAluno = TbAluno::all();
        $turma = TbTurma::findOrFail($id);
        $turma->delete();
        return redirect()->route('instituicao.alunos'); 
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
    public function inserir_arquivo(Request $request){
        $cardapio = new TbCardapio();
        $cardapio->img = $request->url;
        return back()->with('success', 'Cardapio enviado com sucesso!'); 
    }

    // CARDAPIO

    public function inserir_cardapio (Request $request){
        $cardapio = new TbCardapio();
        $cardapio->dt_cardapio = $request -> data;
        $cardapio ->nm_ddsemana = $request ->ddSemana;
        $cardapio ->nm_prato = $request->nomeprato;
        $cardapio ->desc_prato = $request->descprato;
        $cardapio ->img_prato = $request->imgprato;
        $cardapio ->nm_sobremessa = $request->nomesobremessa;
        $cardapio ->desc_sobremessa = $request->descsobremessa;
        $cardapio ->img_sobremssa = $request->imgsobremessa;
    }
    public function visualizar_cardaio($id){
        $cardapio = TbCardapio::findOrFail($id);
        return view('telas.instituicao.visualizar_cardapio');
    }

    public function editar_cardapio($id) {
        $cardapio = TbCardapio::findOrFail($id);
        return view('telas.instituicao.editar_cardapio');
    }
}
