<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerSkedoo;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\EducadorController;
use App\Http\Controllers\ResponsavelController;
use App\Http\Controllers\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/remetente', function (){
    $id_remetente = session()->get('login.cd_login');
    return response($id_remetente);
});
Route::get('/novadata', function () {
    $novaData = \Carbon\Carbon::now(new DateTimeZone('America/Sao_Paulo'))->format('d/m/Y');
    return response($novaData);
});
Route::get('/novahora', function () {
    $novaHora = \Carbon\Carbon::now(new DateTimeZone('America/Sao_Paulo'))->format('H:i:s');
    return response($novaHora);
});
//Tela Home
Route::get('/', function () {
    return view('home');
})->name('skedoo_pag');

//Tela de contato
Route::get('/contato', function () {
    return view('contato');
})->name('contato_pag');

//Tela de login
Route::get('/login', [LoginController::class, 'index'])->name('login_pag');
Route::post('/login', [LoginController::class, 'autenticarLogin'])->name('login_pag');
Route::get('/logout', [LoginController::class, 'logoutLogin'])->name('logout');

//Rota de Instituição
Route::group(['middleware' => ['loginAccess']], function() {
    Route::get('/instituicao', [InstituicaoController::class, 'index'])->name('instituicao');
    
    Route::get('instituicao/clientes', [InstituicaoController::class, 'cliente'])->name('instituicao.clientes');
    Route::post('instituicao/clientes', [InstituicaoController::class, 'insert_cliente'])->name('instituicao.clientes.insert');
    Route::delete('instituicao/clientes/{id}', [InstituicaoController::class, 'deletar_cliente'])->name('instituicao.clientes.delete');
    Route::get('instituicao/clientes/{id}', [InstituicaoController::class, 'visualizar_cliente'])->name('instituicao.clientes.view');
    Route::get('instituicao/clientes/edit/{id}', [InstituicaoController::class, 'editar_cliente'])->name('instituicao.clientes.edit');
    Route::patch('instituicao/clientes/edit/{id}', [InstituicaoController::class, 'update_cliente'])->name('instituicao.clientes.update');
    
    Route::get('instituicao/ajuda', [InstituicaoController::class, 'ajuda'])->name('instituicao.ajuda');
    
    Route::get('instituicao/alunos', [InstituicaoController::class, 'aluno'])->name('instituicao.alunos');
    Route::post('instituicao/aluno', [InstituicaoController::class, 'inserir_aluno'])->name('instituicao.aluno.insert');
    Route::delete('instituicao/alunos/{id}', [InstituicaoController::class, 'deletar_aluno'])->name('instituicao.aluno.delete');
    Route::get('instituicao/alunos/{id}', [InstituicaoController::class, 'visualizar_aluno'])->name('instituicao.aluno.view');
    
    Route::post('instituicao/turma', [InstituicaoController::class, 'inserir_turma'])->name('instituicao.turma.insert');
    Route::delete('instituicao/turmas/{id}', [InstituicaoController::class, 'deletar_turma'])->name('instituicao.turma.delete');
    Route::get('instituicao/turmas/{id}', [InstituicaoController::class, 'visualizar_turma'])->name('instituicao.turma.view');
    
    Route::get('instituicao/saude', [InstituicaoController::class, 'problemassaude'])->name('instituicao.problemassaude');  

    
    Route::get('instituicao/transportes', [InstituicaoController::class, 'transporte'])->name('instituicao.transporte');
    Route::get('instituicao/financeiros', [InstituicaoController::class, 'financeiro'])->name('instituicao.financeiro');
    
    Route::get('instituicao/colaborador', [InstituicaoController::class, 'colaborador'])->name('instituicao.colaborador');
    Route::post('instituicao/colaborador', [InstituicaoController::class, 'inserir_colaborador'])->name('instituicao.colaborador');
    Route::get('instituicao/colaborador/{id}', [InstituicaoController::class, 'visualizar_colaborador'])->name('instituicao.colaborador.view');
    Route::delete('instituicao/colaborador/{id}', [InstituicaoController::class, 'deletar_colaborador'])->name('instituicao.colaborador.delete');
    Route::get('instituicao/colaborador/editar/{id}', [InstituicaoController::class, 'atualizar_colaborador'])->name('instituicao.colaborador.atualizar');
    Route::patch('instituicao/colaborador/editar/{id}', [InstituicaoController::class, 'update_colaborador'])->name('instituicao.colaborador.atualizar');
    
    Route::get('instituicao/mensagem', [InstituicaoController::class, 'mensagem'])->name('instituicao.mensagem');
    
    Route::get('instituicao/calendario', [InstituicaoController::class, 'calendario'])->name('instituicao.calendario');
    Route::post('instituicao/calendario', [InstituicaoController::class, 'calendarioStore'])->name('instituicao.calendario.store');
    Route::patch('instituicao/calendario/{id}', [InstituicaoController::class, 'calendarioUpdate'])->name('instituicao.calendario.update');
    Route::delete('instituicao/calendario/{id}', [InstituicaoController::class, 'calendarioDelete'])->name('instituicao.calendario.delete');
    
    Route::get('instituicao/refeicao', [InstituicaoController::class, 'visualizar_cardapio'])->name('instituicao.refeicao');  
    Route::post('instituicao/refeicao', [InstituicaoController::class, 'inserir_cardapio'])->name('instituicao.refeicao.insert');
    Route::delete('instituicao/refeicao/{id}', [InstituicaoController::class, 'deletar_cardapio'])->name('instituicao.refeicao.delete');
    Route::get('instituicao/refeicao/{id}', [InstituicaoController::class, 'editar_cardapio'])->name('instituicao.refeicao.update');
    Route::get('instituicao/refeicao/download',[InstituicaoController::class, 'download'])->name('download.arquivo');

    Route::get('instituicao/dashboard', [InstituicaoController::class, 'dashboard'])->name('instituicao.dashboard');
    Route::get('/dados-grafico', 'ChartController@dadosGrafico');
    

    Route::get('instituicao/perfil', [InstituicaoController::class, 'perfil'])->name('instituicao.perfil');
    Route::post('instituicao/perfil', [InstituicaoController::class, 'atualizarPerfil'])->name('instituicao.perfil.atualizar');
});

//Rota de Educador
Route::group(['middleware' => ['loginAccess2']], function() {
    Route::get('/educador', [EducadorController::class, 'educador'])->name('educador');
    Route::get('educador/turmas', [EducadorController::class, 'aluno'])->name('educador.alunos');
    Route::get('educador/refeicao', [EducadorController::class, 'visualizar_cardapio'])->name('instituicao.refeicao'); 
    Route::get('educador/ajuda', [EducadorController::class, 'ajuda'])->name('educador.ajuda');
    Route::get('educador/mensagens', [EducadorController::class, 'mensagem'])->name('educador.mensagem');
    Route::get('educador/calendario', [EducadorController::class, 'calendario'])->name('educador.calendario');

    Route::get('educador/perfil', [EducadorController::class, 'perfil'])->name('educador.perfil');
    Route::post('educador/perfil', [EducadorController::class, 'atualizarPerfil'])->name('educador.perfil.atualizar');
});

//Rota de Responsáveis
Route::group(['middleware' => ['loginAccess3']], function() {
    Route::get('/responsavel', [ResponsavelController::class, 'responsavel'])->name('responsavel');
    Route::get('responsavel/mensagens', [ResponsavelController::class, 'mensagem'])->name('responsavel.mensagens');
    Route::get('responsavel/ajuda', [ResponsavelController::class, 'ajuda'])->name('responsavel.ajuda');
    Route::get('responsavel/saude', [ResponsavelController::class, 'saude'])->name('responsavel.saude');
    Route::get('responsavel/calendario', [ResponsavelController::class, 'calendario'])->name('responsavel.calendario');
    Route::get('responsavel/transporte', [ResponsavelController::class, 'transporte'])->name('responsavel.transporte');
    Route::get('responsavel/refeicao', [ResponsavelController::class, 'visualizar_cardapio'])->name('responsavel.refeicao');

    Route::get('responsavel/perfil', [ResponsavelController::class, 'perfil'])->name('responsavel.perfil');
    Route::post('responsavel/perfil', [ResponsavelController::class, 'atualizarPerfil'])->name('responsavel.perfil.atualizar');
});



Route::get('/clientes', [ControllerSkedoo::class, 'cliente'])->name('clientes');
Route::get('/ajuda', [ControllerSkedoo::class, 'ajuda'])->name('ajuda');
Route::get('/alunos', [ControllerSkedoo::class, 'aluno'])->name('alunos');
