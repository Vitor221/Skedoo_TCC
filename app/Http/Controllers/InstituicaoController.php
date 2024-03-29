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
use App\Models\TbPagamento;
use App\Models\TbStatusPagamento;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\TbCidade;
use App\Models\TbFormaPagamento;
use App\Models\TbInstituicao;
use App\Models\TbLogin;
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

        return redirect()->route('login_pag')->with('mensagem', 'Precisa efetuar o login');
    }


    public function problemassaude(Request $request)
    {
        $login = TbLogin::find(session('login'))->first();
        $TbAlunos = TbAluno::all();
        $TbResponsaveis = TbResponsavel::all();
        $verificarNome = $request->input('nome');
        $alunoExiste = TbAluno::where('nm_aluno', $verificarNome)->first();
        if ($alunoExiste) {
            if ($alunoExiste !== null) {
                $saude = $alunoExiste;
            }

            $saude->nm_grav_saude = $request->grav;
            $saude->nm_tipo_ps = $request->tipos;
            $saude->nm_problema_saude = $request->nomedoproblema;
            $saude->ds_problema_saude = $request->textarea_div;

            $saude->save(); // Salvar as alterações no registro existente
        }
        return view('telas.instituicao.problemassaude', [
            'login' => $login,
            'TbAlunos' => $TbAlunos,
        ]);
    }
    public function problemassaude_insert(Request $request)
    {
        $term = $request->get('nome');
        $results = TbAluno::where('nm_aluno', 'LIKE', '%' . $term . '%')->pluck('nm_aluno');
        $verificarNome = $request->input('nome');
        $verificarCd = $request->input('cd');
        $alunoExiste = TbAluno::where('nm_aluno', $verificarNome)->first();
        $cdExiste = TbAluno::where('cd_aluno', $verificarCd)->first();
        if ($alunoExiste || $cdExiste) {
            if ($alunoExiste !== null) {
                $saude = $alunoExiste;
            } elseif ($cdExiste !== null) {
                $saude = $cdExiste;
            }

            $saude->nm_grav_saude = $request->grav;
            $saude->nm_tipo_ps = $request->tipos;
            $saude->nm_problema_saude = $request->nomedoproblema;
            $saude->ds_problema_saude = $request->textarea_div;

            $saude->save(); // Salvar as alterações no registro existente
        }

        $response = response()->json($results);
        return redirect()->route('instituicao.problemassaude');
    }

public function visualizar_problemassaude($id)
{
    $Aluno = TbAluno::find($id);
    $login = TbLogin::find(session('login'))->first();


    if (!$Aluno) {
        return response()->json(['error' => 'Aluno não encontrado'], 404);
    }

    return response()->json([
        'nome' => $Aluno->nome,
        'Gravidade' => $Aluno->nm_grav_saude,
        'Tipo' => $Aluno->nm_tipo_ps,
        'Nomedoproblema' => $Aluno->nm_problema_saude,
        'Descrição' => $Aluno->ds_problema_saude,
        // Adicione mais campos conforme necessário
    ]);
}


public function deletar_problemasaude($id)
{
    $aluno = TbAluno::findOrFail($id);

    $aluno->nm_grav_saude = '';
    $aluno->nm_tipo_ps = '';
    $aluno->nm_problema_saude = '';
    $aluno->ds_problema_saude = '';

    $aluno->save();

        return redirect()->route('instituicao.problemassaude');
        
}
   
    

    public function cliente(Request $request)
    {
        $TbResponsaveis = TbResponsavel::paginate(6);
        $TbTurmas = TbTurma::all();
        $login = TbLogin::find(session('login'))->first();


        if ($request->input('s')) {
            $TbResponsaveis = TbResponsavel::search($request->input('s'));
        } else {
            $TbResponsaveis = TbResponsavel::paginate(6);
        }

        return view('telas.instituicao.clientes', ['TbResponsaveis' => $TbResponsaveis, 'TbTurmas' => $TbTurmas, 'login' => $login]);
    }

    public function aluno(Request $request)
    {
        $login = TbLogin::find(session('login'))->first();
        $TbAlunos = TbAluno::paginate(6);
        $TbTurma = TbTurma::all();

        if ($request->input('s')) {
            $TbAlunos = TbAluno::search($request->input('s'));
        } else {
            $TbAlunos = TbAluno::paginate(6);
        }

        return view('telas.instituicao.alunos', ['TbAlunos' => $TbAlunos, 'TbTurma' => $TbTurma, 'login' => $login]);
    }

    public function visualizar_turma($id)
    {
        $TbTurma = TbTurma::findOrFail($id);
        $TbAluno = TbAluno::all();
        $login = TbLogin::find(session('login'))->first();
        $Profissionais = TbProfissional::all();


        //Verificando turma selecionada

        $cdTurmaSelecionada = $TbTurma->cd_turma;

        //Contando quantidade de alunos da sala
        $qtdalunosNaTurma = TbAluno::select('cd_turma', DB::raw('count(*) as total_alunos'))
            ->where('cd_turma', $cdTurmaSelecionada)
            ->groupBy('cd_turma')
            ->first();


        //Monstrando professores da sala
        $professoresnaturma = TbProfissional::where('cd_turma', $cdTurmaSelecionada)
            ->get();

        //Monstrando alunos da sala
        $alunosnaturma = TbAluno::where('cd_turma', $cdTurmaSelecionada)
            ->get();


        return view('telas.instituicao.visualizar_turma', [
            'turma' => $TbTurma,
            'TbAlunos' => $TbAluno,
            'login' => $login,
            'qtdalunosNaTurma' => $qtdalunosNaTurma,
            'alunosnaturma' => $alunosnaturma,
            'professoresnaturma' => $professoresnaturma
        ]);
    }

    public function ajuda()
    {
        $login = TbLogin::find(session('login'))->first();
        return view('telas.instituicao.ajuda', ['login' => $login]);
    }

    public function mensagem()
    {
        $cdLoginInstituicao = session()->get('login.cd_login');
        $Instituicao = TbInstituicao::where('cd_cadastro', $cdLoginInstituicao)->first();
        $TbAlunos = TbAluno::where('cd_instituicao', $Instituicao->cd_instituicao)->get();
        foreach ($TbAlunos as $Aluno) {
            $TbResponsavel[] = TbResponsavel::where('cd_responsavel', $Aluno->cd_responsavel)->get();
        }
        $TbEducadores = TbProfissional::where('cd_instituicao', $Instituicao->cd_instituicao)->get();
        $login = TbLogin::find(session('login'))->first();
        return view('telas.instituicao.mensagem', ['TbResponsavel' => $TbResponsavel, 'login' => $login, 'TbEducadores' => $TbEducadores]);
    }
    public function financeiro()
    {
        $cdLoginInstituicao = session()->get('login.cd_login');
        $Instituicao = TbInstituicao::where('cd_cadastro', $cdLoginInstituicao)->first();
        $TbAlunos = TbAluno::where('cd_instituicao', $Instituicao->cd_instituicao)->get();
        foreach ($TbAlunos as $Aluno) {
            $TbResponsavel[] = TbResponsavel::where('cd_responsavel', $Aluno->cd_responsavel)->get();
            $TbPagamento[] = TbPagamento::where('cd_responsavel', $Aluno->cd_responsavel)->get();
        }
        $TbFormaPagamento = TbFormaPagamento::all();
        $login = TbLogin::find(session('login'))->first();
        return view('telas.instituicao.financeiro', ['TbResponsavel' => $TbResponsavel, 'login' => $login, 'TbPagamento' => $TbPagamento, 'TbFormaPagamento' => $TbFormaPagamento]);
    }
    public function financeiro_inserir_plano(Request $request)
    {
        $TbFormaPagamento = new TbFormaPagamento();
        $TbFormaPagamento->nm_forma_pagamento = $request->plano;
        $TbFormaPagamento->vl_fatura = $request->valorPlano;
        $registro = TbFormaPagamento::latest('cd_forma_pagamento')->first();
        $cdNovo = $registro->cd_forma_pagamento+1;
        $TbFormaPagamento->cd_forma_pagamento = $cdNovo;
        $TbFormaPagamento->save();
        return redirect()->route('instituicao.financeiro');
    }

    public function transporte()
    {
        return view('telas.instituicao.transporte');
    }

    public function colaborador(Request $request)
    {
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
    public function inserir_colaborador(Request $request)
    {
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

    public function visualizar_colaborador($id)
    {
        $educador = TbProfissional::findOrFail($id);
        $turma = $educador->tb_turma;
        $login = TbLogin::find(session('login'))->first();

        return view('telas.instituicao.visualizar_educador', ['educador' => $educador, 'turma' => $turma, 'login' => $login]);
    }

    public function atualizar_colaborador($id)
    {
        $educador = TbProfissional::findOrFail($id);
        $login = TbLogin::find(session('login'))->first();

        if (!$educador->cd_turma || $educador->cd_turma) {
            $turma = $educador->tb_turma;
            $tbturmas = TbTurma::all();
            return view('telas.instituicao.editar_educador', compact('educador', 'turma', 'tbturmas', 'login'));
        }
    }

    public function update_colaborador(Request $request, $id)
    {
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

    public function deletar_colaborador($id)
    {
        $educador = TbProfissional::findOrFail($id);

        $educador->delete();
        return redirect()->route('instituicao.colaborador');
    }

    //CRUD - Colaborador - FIM

    //CRUD - Calendário - INICIO
    public function calendario()
    {
        $login = TbLogin::find(session('login'))->first();
        $infoEventos = Event::all()->first();
        $eventos = array();
        $diasEventos = Event::all();
        foreach ($diasEventos as $diaEvento) {
            $eventos[] = [
                'id'        =>      $diaEvento->id,
                'title'     =>      $diaEvento->title,
                'start'     =>      $diaEvento->start_event,
                'end'       =>      $diaEvento->end_event
            ];
        }
        return view('telas.instituicao.calendario', ['eventos' => $eventos, 'login' => $login, 'infoEventos' => $infoEventos]);
    }

    public function calendarioStore(Request $request)
    {
        $login = TbLogin::find(session('login'))->first();
        $request->validate([
            'title' =>  'required|string',
        ]);

        $calendario = Event::create([
            'title'         =>  $request->title,
            'start_event'   =>  $request->start_event,
            'end_event'     =>  $request->end_event,
        ]);
        return view('telas.instituicao.calendario', ['login' => $login])->with(response()->json($calendario));
    }

    public function calendarioUpdate(Request $request, $id)
    {
        $calendario = Event::find($id);
        $login = TbLogin::find(session('login'))->first();
        if (!$calendario) {
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
        if (!$calendario) {
            return response()->json([
                'error' => 'Não foi localizado o evento'
            ], 404);
        }

        $calendario->delete();

        return $id;
    }
    //CRUD - Calendário - FIM

    //CRUD - Cliente - INICIO
    public function inserir_cliente(Request $request)
    {
        $responsavel = new TbResponsavel();
        $responsavel->nm_responsavel = $request->name;
        $responsavel->cd_cpf = $request->cpf;
        $cadastro = $responsavel->tb_cadastro()->create(['nm_login' => 'teste', 'cd_senha' => 'teste']);
        $responsavel->cd_cadastro = $cadastro->cd_cadastro;
        $uf = TbUf::find($request->uf);
        $cidade = $uf->tb_cidade()->firstOrCreate(['nm_cidade' => $request->cidade]);
        $bairro = $cidade->tb_bairro()->firstOrCreate(['nm_bairro' => $request->bairro, 'cd_cidade' => $cidade->cd_cidade]);
        $endereco = $bairro->tb_endereco()->create(['cd_cep' => $request->cep, 'cd_numcasa' => $request->num, 'nm_endereco' => $request->logradouro, 'ds_complemento' => $request->complemento,  'cd_bairro' => $bairro->cd_bairro]);
        $responsavel->cd_endereco = $endereco->cd_endereco;
        $responsavel->save();
        $aluno = new TbAluno();
        $aluno->nm_aluno = $request->nomeAluno;
        $aluno->cd_turma = $request->turma;
        $aluno->se_problema_saude = $request->select_form_value;
        if ($request->select_form_value == 1) {
            $aluno->se_problema_saude = $request->select_form_value;
            $aluno->ds_problema_saude = $request->descricaoPS;
            $aluno->nm_problema_saude = $request->nomePS;
            $aluno->nm_grav_saude = $request->nomeGravidade;
            $aluno->nm_tipo_ps = $request->tipos;
        }
        $aluno->cd_responsavel = $responsavel->cd_responsavel;
        $aluno->save();       
        $TbResponsaveis = TbResponsavel::paginate(6);
        return back()->with('success', 'Responsavel cadastrado com sucesso!');
    }

    public function deletar_cliente($id)
    {
        $responsavel = TbResponsavel::findOrFail($id);
        $enderecoCount = TbResponsavel::all()->where('cd_endereco', '=', $responsavel->cd_endereco)->count();
        $Turma = TbTurma::all();
        $responsavel->tb_responsavel_aluno()->delete();
        $responsavel->tb_aluno()->delete();
        $responsavel->tb_contato()->delete();
        $responsavel->tb_login()->delete();
        $responsavel->delete();
        if ($enderecoCount == 1) {
            $responsavel->tb_endereco()->delete();
        }
        return redirect()->route('instituicao.clientes');
    }

    public function visualizar_cliente($id)
    {
        $login = TbLogin::find(session('login'))->first();
        $responsavel = TbResponsavel::findOrFail($id);
        $endereco = $responsavel->tb_endereco;
        $aluno = $responsavel->tb_aluno[0];
        return view('telas.instituicao.visualizar_cliente', compact('responsavel', 'endereco', 'aluno', 'login'));
    }

    public function editar_cliente($id)
    {
        $login = TbLogin::find(session('login'))->first();
        $responsavel = TbResponsavel::findOrFail($id);
        $endereco = $responsavel->tb_endereco;
        return view('telas.instituicao.editar_cliente', compact('responsavel', 'endereco', 'login'));
    }

    public function update_cliente(Request $request, $id)
    {
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
    public function inserir_aluno(Request $request)
    {
        $aluno = new TbAluno();
        $aluno->nm_aluno = $request->nomeAluno;
        $aluno->cd_turma = $request->turma;
        if ($request->ps == 1) {
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
    public function deletar_aluno($id)
    {
        $aluno = TbAluno::findOrFail($id);
        $aluno->delete();
        $TbTurma = TbTurma::all();
        $TbAluno = TbAluno::all();
        return redirect()->route('instituicao.alunos');
    }
    //CRUD - Aluno - FIM

    //CRUD - Turma - INICIO
    public function inserir_turma(Request $request)
    {
        $turma = new TbTurma();
        $turma->nm_turma = $request->nomeTurma;
        $turma->cd_total_aluno = $request->qtdMax;
        $turma->sg_turma = $request->sigla;
        if ($request->periodo == "M") {
            $turma->ds_periodo = "Manhã";
        } else if ($request->periodo == "T") {
            $turma->ds_periodo = "Tarde";
        } else {
            $turma->ds_periodo = "Integral";
        }
        $turma->save();
        $TbTurma = TbTurma::all();
        $TbAluno = TbAluno::all();
        return redirect()->route('instituicao.alunos');
    }
    public function deletar_turma($id)
    {
        $TbTurma = TbTurma::all();
        $TbAluno = TbAluno::all();
        $turma = TbTurma::findOrFail($id);
        $turma->delete();
        return redirect()->route('instituicao.alunos');
    }
    //CRUD - Turma - FIM

    public function download()
    {
        $cardapio = TbCardapio::whereNotNull('img_pdf')->latest()->first();

        if ($cardapio) {
            $filePath = storage_path('app/public/' . $cardapio->img_pdf);

            if (file_exists($filePath)) {
                return response()->download($filePath);
            }
        }

        // Caso o arquivo não exista ou nenhum Cardapio válido seja encontrado
        return redirect()->route('instituicao.refeicao')->with('error', 'Arquivo não encontrado.');
    }

    public function inserir_cardapio(Request $request)
    {
        $ddsemana = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'];
        $ddsemananum = date('w', strtotime($request->data));
        $cardapio = new TbCardapio();
        $cardapio->dt_cardapio = $request->data;
        $cardapio->nm_prato = $request->nmPrato;
        $cardapio->desc_prato = $request->DescPrato;
        $cardapio->cd_cor = $request->cor;
        $cardapio->nm_ddsemana = $ddsemana[$ddsemananum];
        $cardapio->nm_sobremessa = $request->nmSobremessa;
        $cardapio->desc_sobremessa = $request->DescSobremessa;

        if ($request->hasFile('imgdopdf')) {
            $novoNome = Str::slug(date('M'), '-') . '.' . $request->imgdopdf->getClientOriginalExtension();
            $imagem = $request->file('imgdopdf')->storeAs('public/cardapio', $novoNome);
            $cardapio->img_pdf = 'cardapio/' . $novoNome;
        }

        $cardapio->save();

        return back()->with('success', 'Cardapio enviado com sucesso!');
    }
    public function visualizar_cardapio()
    {
        $dataAtual = Carbon::now()->format('Y-m-d');
        $login = TbLogin::find(session('login'))->first();
        $TbCardapio = TbCardapio::orderBy('dt_cardapio', 'asc')->where('dt_cardapio', '>', $dataAtual)->get();
        $cardapioAnterior = TbCardapio::orderBy('dt_cardapio', 'asc')->where('dt_cardapio', '<', $dataAtual)->get();
        $cardapioHoje = TbCardapio::where('dt_cardapio', $dataAtual)->first();
        return view('telas.instituicao.refeicao', ['TbCardapio' => $TbCardapio, 'cardapioHoje' => $cardapioHoje, 'cardapioAnterior' => $cardapioAnterior, 'login' => $login]);
    }
    public function deletar_cardapio($id)
    {
        $refeicao = TbCardapio::findOrFail($id);
        $refeicao->delete();
        return redirect()->back();
    }
    public function editar_cardapio($id)
    {
        $cardapio = TbCardapio::findOrFail($id);
        return view('telas.instituicao.editar_cardapio');
    }

    // DASHBORD

    public function dashboard(Request $request){
            $TbTurmas = TbTurma::all();
            $TbAlunos = TbAluno::all();
            $Tbpagamentos = TbPagamento::all();
            $TbStatusPagamento = TbStatusPagamento::all();
            $TbResponsavel = TbResponsavel::all();
            $login = TbLogin::find(session('login'))->first();

        // Fazendo contagem - Quantos em cada sala matriculados
        $alunosPorTurma = TbAluno::select('cd_turma', DB::raw('count(*) as total_alunos'))
            ->groupBy('cd_turma')
            ->get()
            ->keyBy('cd_turma');

        // Fazendo contagem - Quantos responsaveis cadastrados
        $clienteCadastrados = TbResponsavel::selectRaw('count(*) as total_Clientes')
            ->first();


        //Fazendo Contagem Anual de Recebimento

        $RecebimentoTotal = TbResponsavel::selectRaw("CONCAT('R$ ', FORMAT(ROUND(SUM(vl_fatura), 2), 2, 'de_DE')) AS total_recebido")
            ->from('tb_pagamento')
            ->first();

        // separando por mês e quantidade de contratos.
        $recebimentoPorMes = TbPagamento::selectRaw("DATE_FORMAT(dt_pagamento, '%m/%Y') as mes_ano, COUNT(*) as quantidade, CONCAT('R$ ', FORMAT(SUM(vl_fatura), 2, 'de_DE')) AS total_recebido")
            ->groupBy('mes_ano')
            ->orderBy('mes_ano')
            ->get();

        // Separando por bairro as quantidade de responsaveis
        $bairros = TbResponsavel::select('tb_bairro.nm_bairro as nome_bairro', DB::raw('COUNT(*) as total_responsaveis'))
            ->join('Tb_endereco', 'Tb_responsavel.cd_endereco', '=', 'tb_endereco.cd_endereco')
            ->join('tb_bairro', 'Tb_endereco.cd_bairro', '=', 'Tb_bairro.cd_bairro')
            ->groupBy('nome_bairro')
            ->get();


        $responsaveis = TbResponsavel::join('tb_pagamento', 'tb_responsavel.cd_responsavel', '=', 'tb_pagamento.cd_pagamento')
            ->join('Tb_status_pagamento', 'tb_pagamento.cd_status_pagamento', '=', 'tb_status_pagamento.cd_status_pagamento')
            ->select('tb_status_pagamento.nm_status_pagamento', DB::raw('COUNT(tb_responsavel.cd_responsavel) AS quantidade'))
            ->groupBy('tb_status_pagamento.nm_status_pagamento')
            ->get();

        return view('telas.instituicao.dashboard',[
            'login' => $login,
            'TbTurmas' =>$TbTurmas,
            'TbAlunos' => $TbAlunos,
            'alunosPorTurma' => $alunosPorTurma,
            'clienteCadastrados' => $clienteCadastrados,
            'RecebimentoTotal' => $RecebimentoTotal,
            'RecebimentoPorMes' => $recebimentoPorMes,
            'bairros' => $bairros,
            'responsaveis' => $responsaveis

        ]);}

    public function perfil()
    {
        if (session()->has('login')) {
            $login = TbLogin::find(session('login'))->first();
            return view('telas.instituicao.perfil', compact('login'));
        }
        return redirect()->route('login')->with('mensagem', 'Precisa efetuar o login');
    }

    public function atualizarPerfil(Request $request)
    {
        $request->validate([
            'image' =>  'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $login = TbLogin::find(session('login'))->first();

        if ($login->img_perfil) {
            Storage::disk('public')->delete($login->img_perfil);
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('storage', 'public');
            $login->img_perfil = $imagePath;
            $login->save();
        }



        return view('telas.instituicao.perfil', ['login' => $login]);
    }

    public function dadosGrafico()
    {
        $TbAlunos = TbAluno::all();
        // Lógica para recuperar os dados do banco de dados usando o modelo correspondente
        $alunosGf = TbAluno::all()->count();

        // GRÁFICO 01 - Alunos
        $alunosDados = TbAluno::select([
            'cd_turma', DB::raw('count(*) as total_alunos')
        ])
            ->groupBy('cd_turma')
            ->orderBy('cd_turma', 'asc')
            ->get();

        // Preparar arrays
        foreach ($alunosDados as $alunoUser) {
            $cd_turma[] = $alunoUser->cd_turma;
            $total[] = $alunoUser->total;
        }

        // p/ ChartJS
        $turmaUser = implode(',', $cd_turma);
        $totalUser = implode(',', $total);

        // GRÁFICO 02 - Turmas
        $turmDados = TbTurma::all();

        // array
        foreach ($turmDados as $turm) {
            $turmNome[] = "'" . $turm->nome . "'";
            $turmTotal[] = TbAluno::where('cd_turma', $turm->cd)->count();
        }

        // formatar
        $turmLabel = implode(',', $turmNome);
        $turmTotal = implode(',', $turmTotal);

        return view('telas.instituicao.dashboard', compact('alunosGf', 'turmaUser', 'totalUser', 'turmLabel', 'turmTotal'));
    }
}
