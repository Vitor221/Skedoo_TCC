<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TbCardapio;
use App\Models\TbResponsavel;
use App\Models\TbAluno;
use App\Models\TbBairro;
use App\Models\TbCadastro;
use App\Models\TbUf;
use App\Models\TbTurma;
use App\Models\TbEndereco;
use App\Models\TbEventos;
use App\Models\TbProfissional;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TbCidade;
use App\Models\TbLogin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class InstituicaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('loginAccess')->except('logoutLogin', 'index');
    }
    
    public function index()
    {
        $cd_acesso = session()->get('login.cd_acesso');
        $login = TbLogin::find(session('login'))->first();

        if (session()->has('login') && $cd_acesso == 1) {
            return view('login_pags.instituicao', ['login' => $login]);
        } else {
            return redirect()->back();
        }

        return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
    }

    public function saude() {
        return view('telas.instituicao.saude');
    }

    public function problemassaude() {
        $login = TbLogin::find(session('login'))->first();
        return view('telas.instituicao.problemassaude', ['login' => $login]);
    }
    
    public function cliente(Request $request){
        $TbResponsaveis = TbResponsavel::paginate(6);
        $TbTurmas = TbTurma::all();
        $login = TbLogin::find(session('login'))->first();


        if ($request->input('s')) {
            $TbResponsaveis = TbResponsavel::search($request->input('s'));
        } else {
            $TbResponsaveis = TbResponsavel::paginate(6);
        }


        return view('telas.instituicao.clientes',['TbResponsaveis'=>$TbResponsaveis, 'TbTurmas'=>$TbTurmas, 'login' => $login]); 
    }

    public function aluno(Request $request){
      
        $TbAluno = TbAluno::all();
        $TbTurma = TbTurma::all();
        $login = TbLogin::find(session('login'))->first();

        if ($request->input('s')) {
            $TbAlunos = TbAluno::search($request->input('s'));
        } else {
            $TbAlunos = TbAluno::paginate(6);
        }

        
        return view('telas.instituicao.alunos',['TbAluno'=>$TbAluno, 'TbTurma'=>$TbTurma, 'login' => $login]); 
    }

    public function ajuda(){
        $login = TbLogin::find(session('login'))->first();
        return view('telas.instituicao.ajuda', ['login' => $login]);
    }

    public function mensagem(){
        $TbResponsavel = TbResponsavel::all();
        $login = TbLogin::find(session('login'))->first();
        return view('telas.instituicao.mensagem',['TbResponsavel'=>$TbResponsavel, 'login' => $login]);
    }
    public function financeiro(){
        $login = TbLogin::find(session('login'))->first();
        return view('telas.instituicao.financeiro', ['login' => $login]);
    }

    // public function transporte(){
    //     return view('telas.instituicao.transporte');
    // }

    public function perfil()
    {
        if (session()->has('login')) {
            $login = TbLogin::find(session('login'))->first();
            return view('telas.instituicao.perfil', compact('login'));
        }
        return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
    }

    public function atualizarPerfil(Request $request) {
        $request->validate([
            'image' =>  'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $login = TbLogin::find(session('login'))->first();
    
        if($login->img_perfil) {
            Storage::disk('public')->delete($login->img_perfil);
        }

        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('storage', 'public');
            $login->img_perfil = $imagePath;    
            $login->save();
        }

        
        
        return view('telas.instituicao.perfil', ['login' => $login]);
    }

    public function colaborador(Request $request){
        $login = TbLogin::find(session('login'))->first();
        $TbEducadores = TbProfissional::paginate(6);
        $TbTurmas = TbTurma::all();

        if ($request->input('s')) {
            $TbEducadores = TbProfissional::search($request->input('s'));
        } else {
            $TbEducadores = TbProfissional::paginate(6);
        }

        return view('telas.instituicao.colaborador', ['TbEducadores' => $TbEducadores, 'TbTurmas' => $TbTurmas, 'login' => $login]);
    }

    //CRUD - Colaborador - INICIO
    public function inserir_colaborador(Request $request) {
        $educador = new TbProfissional();
        $educador->nm_profissional = $request->name;
        $educador->cd_cpf = $request->cpf;
        $educador->nm_funcao = $request->funcao;

        $cadastro = $educador->tb_cadastro()->create();
        $instituicao = $educador->tb_instituicao()->create();
        
        $educador->cd_instituicao = $instituicao->cd_instituicao;
        $educador->cd_cadastro = $cadastro->cd_cadastro;

        $educador->cd_turma = $request->turma;

        $educador->save();

        return redirect()->route('instituicao.colaborador');

    }

    public function visualizar_colaborador($id) {
        $educador = TbProfissional::findOrFail($id);
        $turma = $educador->tb_turma;

        return view('telas.instituicao.visualizar_educador', compact('educador', 'turma'));
        
    }

    public function atualizar_colaborador($id) {
        $educador = TbProfissional::findOrFail($id);

        if(!$educador->cd_turma || $educador->cd_turma){
            $turma = $educador->tb_turma;
            $tbturmas = TbTurma::all();
            return view('telas.instituicao.editar_educador', compact('educador', 'turma', 'tbturmas'));
        }
    }

    public function update_colaborador(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'cpf' => 'required',
            'funcao' => 'required',
            'turma' => 'required',
        ]);
        
        $educador = TbProfissional::findOrFail($id);

        $educador->nm_profissional = $request->name;
        $educador->cd_cpf = $request->cpf;
        $educador->nm_funcao = $request->funcao;

        $turmaId = $request->turma;

        $turma = TbTurma::findOrFail($turmaId);

        $educador->cd_turma = $turma->cd_turma;

        $educador->save();

        return redirect()->route('instituicao.colaborador');

    }

    public function deletar_colaborador($id) {
        $educador = TbProfissional::findOrFail($id);

        $educador->delete();
        return redirect()->route('instituicao.colaborador');
    }

    //CRUD - Colaborador - FIM

    //CRUD - Calendário - INICIO
    public function calendario(){
        $eventos = array();
        $diasEventos = Event::all();
        $login = TbLogin::find(session('login'))->first();
        foreach($diasEventos as $diaEvento) {
            $eventos[] = [
                'id'        =>      $diaEvento->id,
                'title'     =>      $diaEvento->title,
                'start'     =>      $diaEvento->start_event,
                'end'       =>      $diaEvento->end_event
            ];
        }
        return view('telas.instituicao.calendario', ['eventos' => $eventos, 'login' => $login]);
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
        return view('telas.instituicao.calendario')->with(response()->json($calendario));
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
    //CRUD - Calendário - FIM

    //CRUD - Cliente - INICIO
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
        $login = TbLogin::find(session('login'))->first();
        $responsavel = TbResponsavel::findOrFail($id);
        $endereco = $responsavel->tb_endereco;
        $aluno = $responsavel->tb_aluno[0];
        return view('telas.instituicao.visualizar_cliente', compact('responsavel', 'endereco', 'aluno', 'login'));
    }

    public function editar_cliente($id) {
        $login = TbLogin::find(session('login'))->first();
        $responsavel = TbResponsavel::findOrFail($id);
        $endereco = $responsavel->tb_endereco;
        return view('telas.instituicao.editar_cliente', compact('responsavel', 'endereco', 'login'));
    }

    public function update_cliente(Request $request, $id) {
        $responsavel = TbResponsavel::findOrFail($id);
        
        $responsavel->nm_responsavel = $request->name;
        $responsavel->cd_cpf = $request->cpf;

        $responsavel->tb_cadastro()->update([
            'nm_login' => $request->nm_login, 
            'cd_senha' => $request->cd_senha
        ]);

        $responsavel->tb_endereco()->update([
            'nm_endereco' => $request->nm_endereco, 
            'cd_cep' => $request->cd_cep, 
            'cd_numcasa' => $request->cd_numcasa, 
            'ds_complemento' => $request->ds_complemento
        ]);

        $endereco = $responsavel->tb_endereco;

        if ($endereco) {
            $bairro = TbBairro::find($endereco->cd_bairro);
    
            if ($bairro) {
                $bairro->nm_bairro = $request->nm_bairro;
                $bairro->save();
    
                $cidade = TbCidade::find($bairro->cd_cidade);
    
                if ($cidade) {
                    $cidade->nm_cidade = $request->nm_cidade;
                    $cidade->sg_uf = $request->sg_uf;
                    $cidade->save();
                }
            }
        }
         
        $responsavel->save();

        
        return redirect()->route('instituicao.clientes');
    }
    //CRUD - Cliente - FIM

    //CRUD - Aluno - INICIO
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
    //CRUD - Aluno - FIM

    //CRUD - Turma - INICIO
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
    //CRUD - Turma - FIM


    public function inserir_arquivo(){

    
        $files = Storage::files('public/cardapio');
    
    }

    public function inserir_cardapio (Request $request){
        $ddsemana = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'];
        $ddsemananum = date('w', strtotime($request->data));
        $cardapio = new TbCardapio();
        $cardapio->dt_cardapio = $request -> data;
        $cardapio ->nm_prato = $request->nmPrato;
        $cardapio ->desc_prato = $request->DescPrato;
        $cardapio ->cd_cor = $request->cor;
        $cardapio ->nm_ddsemana = $ddsemana[$ddsemananum];
        $cardapio ->nm_sobremessa = $request->nmSobremessa;
        $cardapio ->desc_sobremessa = $request->DescSobremessa;

        if($request->imgdopdf){
            $novoNome = $slug = Str::of(date('M')).'.'.$request->imgdopdf->getClientOriginalExtension();
            
            $image = $request->imgdopdf->StoreAS('cardapio', $novoNome);
            $cardapio['img_pdf'] = $image;
            
            }

        $cardapio -> save();
        
        return back()->with('success', 'Cardapio enviado com sucesso!'); 
    }
    public function download (){

            $path=storage_path('/cardapio/May.doc');

        return back()->Response::download($path);
    }

    public function visualizar_cardapio(){
        $login = TbLogin::find(session('login'))->first();
        $dataAtual = Carbon::now()->format('Y-m-d');
        $TbCardapio = TbCardapio::orderBy('dt_cardapio', 'asc')->where('dt_cardapio','>', $dataAtual)->get();
        $cardapioAnterior = TbCardapio::orderBy('dt_cardapio', 'asc')->where('dt_cardapio','<', $dataAtual)->get();
        $cardapioHoje = TbCardapio::where('dt_cardapio', $dataAtual)->first();
        return view('telas.instituicao.refeicao', ['TbCardapio'=>$TbCardapio, 'cardapioHoje'=>$cardapioHoje, 'cardapioAnterior'=>$cardapioAnterior, 'login' => $login]);
    }
    public function deletar_cardapio($id){
        $refeicao = TbCardapio::findOrFail($id);  
        $refeicao->delete();
        return redirect()->back();
    }
    public function editar_cardapio($id) {
        $cardapio = TbCardapio::findOrFail($id);
        $login = TbLogin::find(session('login'))->first();
        return view('telas.instituicao.editar_cardapio', ['login' => $login]);
    }
}
