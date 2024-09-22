<?php

use App\Http\Controllers\FilmeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GeneroController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/sobre', function () {
    return view ('sobre');
});

Route::get('/admin', [ClienteController::class, 'read']);

Route::put('/deletar-usuario/{id}', [ClienteController::class, 'destroy'])->name('usuarios.deletar');

Route::put('/deletar-filme/{id}', [FilmeController::class, 'destroy'])->name('filmes.deletar');

Route::put('/deletar-genero/{id}', [GeneroController::class, 'destroy'])->name('generos.deletar');

Route::get('/', [FilmeController::class, 'read']);

Route::get('/admin/filmes', [FilmeController::class, 'read']);

Route::get('/admin/contato', [ContatoController::class, 'read']);

Route::get('/admin/generos', [GeneroController::class, 'read']);

Route::post('/enviar-contato', [ContatoController::class, 'store']);

Route::post('/cadastrar-usuario', [ClienteController::class, 'store']);

Route::post('/adicionar-genero', [GeneroController::class, 'store']);

Route::post('/login', [ClienteController::class, 'login']);