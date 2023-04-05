<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerSkedoo;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ResponsavelController;
use App\Http\Controllers\DadosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerfilController;

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

Route::group(['prefix' => 'login'], function () {
    Route::get('/instituicao', [InstituicaoController::class, 'index'])->middleware('loginAccess')->name('instituicao');
    Route::group(['prefix' => 'instituicao'], function() {
        Route::get('/clientes', [DadosController::class, 'cliente'])->name('index.clientes');
        Route::get('/alunos', [DadosController::class, 'aluno'])->name('index.alunos');
        Route::get('/perfil', [PerfilController::class, 'perfilInstituicao'])->name('perfil_pag');
    })->middleware('loginAccess');


    Route::get('/responsavel', [ResponsavelController::class, 'responsavel'])->name('responsavel');
    Route::group(['prefix' => 'responsavel'], function() {
        Route::get('/perfil', [PerfilController::class, 'perfilResponsavel'])->name('perfil_pag');
    });

    Route::get('/educador', [ProfissionalController::class, 'profissional'])->name('profissional');
    Route::group(['prefix' => 'educador'], function() {
        Route::get('/perfil', [PerfilController::class, 'perfilEducador'])->name('perfil_pag');
    });
    
});

Route::get('/clientes', [DadosController::class, 'cliente'])->name('clientes');

Route::get('/alunos', [DadosController::class, 'aluno'])->name('alunos');
Route::get('/perfil', [PerfilController::class, 'perfil'])->name('perfil_pag');
