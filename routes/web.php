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
    Route::post('instituicao/clientes', [InstituicaoController::class, 'inserir_cliente'])->name('instituicao.clientes');
    Route::delete('instituicao/clientes/{id}', [InstituicaoController::class, 'deletar_cliente'])->name('instituicao.clientes.delete');
    Route::get('instituicao/ajuda', [InstituicaoController::class, 'ajuda'])->name('instituicao.ajuda');
    Route::get('instituicao/alunos', [InstituicaoController::class, 'aluno'])->name('instituicao.alunos');
    Route::get('instituicao/perfil', [ControllerSkedoo::class, 'perfil'])->name('perfil_pag');
    Route::get('instituicao/saude', [InstituicaoController::class, 'saude'])->name('instituicao.saude'); 
    Route::get('instituicao/saude/problemassaude', [InstituicaoController::class, 'problemassaude'])->name('instituicao.problemassaude');  
    Route::get('instituicao/saude/refeicao', [InstituicaoController::class, 'refeicao'])->name('instituicao.refeicao');  
    Route::get('instituicao/transportes', [InstituicaoController::class, 'transporte'])->name('instituicao.transporte');
    Route::get('instituicao/financeiros', [InstituicaoController::class, 'financeiro'])->name('instituicao.financeiro');
    Route::get('instituicao/colaborador', [InstituicaoController::class, 'colaborador'])->name('instituicao.colaborador');
    Route::get('instituicao/mensagem', [InstituicaoController::class, 'mensagem'])->name('instituicao.mensagem');
    Route::get('instituicao/calendario', [InstituicaoController::class, 'calendario'])->name('instituicao.calendario');
    Route::get('instituicao/configuracoes', [InstituicaoController::class, 'configuracoes'])->name('instituicao.configuracoes');
});

//Rota de Educador
Route::group(['middleware' => ['loginAccess2']], function() {
    Route::get('/educador', [EducadorController::class, 'educador'])->name('educador');
    Route::get('educador/turmas', [EducadorController::class, 'aluno'])->name('educador.alunos');
    Route::get('educador/saude', [EducadorController::class, 'saude'])->name('educador.saude');
    Route::get('educador/ajuda', [EducadorController::class, 'ajuda'])->name('educador.ajuda');
    Route::get('educador/mensagens', [EducadorController::class, 'mensagem'])->name('educador.mensagem');
    Route::get('educador/calendario', [EducadorController::class, 'calendario'])->name('educador.calendario');
    Route::get('educador/configuracoes', [EducadorController::class, 'configuracoes'])->name('educador.configuracoes');
    Route::get('educador/perfil', [ControllerSkedoo::class, 'perfil'])->name('perfil_pag');
});

//Rota de Responsáveis
Route::group(['middleware' => ['loginAccess3']], function() {
    Route::get('/responsavel', [ResponsavelController::class, 'responsavel'])->name('responsavel');
    Route::get('responsavel/mensagens', [ResponsavelController::class, 'mensagem'])->name('responsavel.mensagens');
    Route::get('responsavel/ajuda', [ResponsavelController::class, 'ajuda'])->name('responsavel.ajuda');
    Route::get('responsavel/saude', [ResponsavelController::class, 'saude'])->name('responsavel.saude');
    Route::get('responsavel/configuracoes', [ResponsavelController::class, 'configuracoes'])->name('responsavel.configuracoes');
    Route::get('responsavel/calendario', [ResponsavelController::class, 'calendario'])->name('responsavel.calendario');
    Route::get('responsavel/transporte', [ResponsavelController::class, 'transporte'])->name('responsavel.transporte');
    Route::get('responsavel/perfil', [ControllerSkedoo::class, 'perfil'])->name('perfil_pag');
});



Route::get('/clientes', [ControllerSkedoo::class, 'cliente'])->name('clientes');
Route::get('/ajuda', [ControllerSkedoo::class, 'ajuda'])->name('ajuda');
Route::get('/alunos', [ControllerSkedoo::class, 'aluno'])->name('alunos');
Route::get('/perfil', [ControllerSkedoo::class, 'perfil'])->name('perfil_pag');
