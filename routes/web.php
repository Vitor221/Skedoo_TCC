<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerSkedoo;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\DadosController;
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

Route::get('/', function () {
    return view('home');
})->name('skedoo_pag');

Route::get('/contato', function() {
    return view('contato');
})->name('contato_pag');

Route::view('/login', [LoginController::class, 'login'])->name('login_pag');
Route::post('/login', [LoginController::class, 'autenticar'])->name('autenticar');

Route::get('/inicio', [ControllerSkedoo::class, 'inicio'])->name('inicio_pag');

Route::group(['prefix' => 'login'], function() {
    Route::get('/instituicao', [InstituicaoController::class, 'index'])->name('instituicao');


});

Route::get('/clientes',[DadosController::class,'cliente'])->name('index.clientes');

Route::get('/alunos',[DadosController::class,'aluno'])->name('index.alunos');