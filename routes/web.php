<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerSkedoo;

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

Route::get('/inicio', [ControllerSkedoo::class, 'inicio'])->name('inicio_pag');