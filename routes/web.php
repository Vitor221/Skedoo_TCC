<?php

use App\Http\Controllers\ColaboradoresController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerSkedoo;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ResponsavelController;
use App\Http\Controllers\DadosController;
use App\Http\Controllers\FinanceirosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MensagemController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\TransporteController;

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

Route::get('/', function () {
    return view('home');
})->name('skedoo_pag');

Route::get('/contato', function () {
    return view('contato');
})->name('contato_pag');

Route::get('/login', [LoginController::class, 'index'])->name('login_pag');
Route::post('/login', [LoginController::class, 'autenticarLogin'])->name('login_pag');
Route::get('/logout', [LoginController::class, 'logoutLogin'])->name('logout');

Route::get('/inicio', [ControllerSkedoo::class, 'inicio'])->name('inicio_pag');

Route::group(['middleware' => ['loginAccess']], function() {
    Route::get('/instituicao', [InstituicaoController::class, 'index'])->name('instituicao');
    Route::get('instituicao/clientes', [DadosController::class, 'cliente'])->name('instituicao.clientes');
    Route::get('instituicao/ajuda', [DadosController::class, 'ajuda'])->name('instituicao.ajuda');
    Route::get('instituicao/alunos', [DadosController::class, 'aluno'])->name('instituicao.alunos');
    Route::get('instituicao/perfil', [PerfilController::class, 'perfil'])->name('perfil_pag');
    Route::get('instituicao/transportes', [TransporteController::class, 'transporte'])->name('instituicao.transporte');
    Route::get('instituicao/financeiros', [FinanceirosController::class, 'financeiro'])->name('instituicao.financeiro');
    Route::get('instituicao/colaborador', [ColaboradoresController::class, 'colaborador'])->name('instituicao.colaborador');
    Route::get('instituicao/mensagem', [MensagemController::class, 'mensagem'])->name('instituicao.mensagem');
});

Route::group(['middleware' => ['loginAccess3']], function() {
    Route::get('/responsavel', [ResponsavelController::class, 'responsavel'])->name('responsavel');
    Route::get('responsavel/mensagens', [DadosController::class, 'cliente'])->name('responsavel.clientes');
    Route::get('responsavel/ajuda', [DadosController::class, 'ajuda'])->name('responsavel.ajuda');
    Route::get('responsavel/saude', [DadosController::class, 'aluno'])->name('responsavel.alunos');
    Route::get('responsavel/perfil', [PerfilController::class, 'perfil'])->name('perfil_pag');
});

Route::group(['middleware' => ['loginAccess2']], function() {
    Route::get('/educador', [ProfissionalController::class, 'profissional'])->name('profissional');
    Route::get('educador/turmas', [DadosController::class, 'cliente'])->name('profissional.clientes');
    Route::get('educador/saude', [DadosController::class, 'ajuda'])->name('profissional.ajuda');
    Route::get('educador/mensagens', [DadosController::class, 'aluno'])->name('profissional.alunos');
    Route::get('educador/perfil', [PerfilController::class, 'perfil'])->name('perfil_pag');
});

Route::get('/clientes', [DadosController::class, 'cliente'])->name('clientes');
Route::get('/ajuda', [DadosController::class, 'ajuda'])->name('ajuda');
Route::get('/alunos', [DadosController::class, 'aluno'])->name('alunos');
Route::get('/perfil', [PerfilController::class, 'perfil'])->name('perfil_pag');
