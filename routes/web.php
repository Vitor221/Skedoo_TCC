<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerSkedoo;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\DadosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ResponsavelController;

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

Route::get('/contato', function() {
    return view('contato');
})->name('contato_pag');

Route::get('/login', [LoginController::class, 'index'])->name('login_pag');
Route::post('/login', [LoginController::class, 'autenticarLogin'])->name('login_pag');
Route::get('/logout', [LoginController::class, 'logoutLogin'])->name('logout');

Route::get('/inicio', [ControllerSkedoo::class, 'inicio'])->name('inicio_pag');

Route::group(['prefix' => 'login'], function() {
    
    Route::get('/instituicao', [InstituicaoController::class, 'index'])->middleware('acessoInstituicao')->name('instituicao');

    Route::get('/profissional', [ProfissionalController::class, 'index'])->middleware('acessoInstituicao')->name('profissional');

    Route::get('/responsavel', [ResponsavelController::class, 'index'])->middleware('acessoInstituicao')->name('responsavel');
});

Route::get('/clientes',[DadosController::class,'cliente'])->name('index.clientes');
Route::get('/alunos',[DadosController::class,'aluno'])->name('index.alunos');