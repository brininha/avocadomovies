<?php

use App\Http\Controllers\FilmeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GeneroController;
use Illuminate\Support\Facades\Mail;

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

Route::put('/deletar-usuario/{id}', [ClienteController::class, 'destroy'])->name('usuarios.deletar');

Route::put('/deletar-filme/{id}', [FilmeController::class, 'destroy'])->name('filmes.deletar');

Route::put('/deletar-contato/{id}', [ContatoController::class, 'destroy'])->name('contatos.deletar');

Route::put('/deletar-genero/{id}', [GeneroController::class, 'destroy'])->name('generos.deletar');

Route::put('editar-filme/{id}', [FilmeController::class, 'update']);

Route::get('/', [FilmeController::class, 'read']);

Route::get('/filme/{id}', [FilmeController::class, 'find']);

Route::get('/admin', [ClienteController::class, 'read']);

Route::get('/admin/usuarios', [ClienteController::class, 'read']);

Route::get('/admin/filmes', [FilmeController::class, 'read']);

Route::get('/admin/contatos', [ContatoController::class, 'read']);

Route::get('/admin/generos', [GeneroController::class, 'read']);

Route::post('/enviar-contato', [ContatoController::class, 'store']);

Route::post('/cadastrar-usuario', [ClienteController::class, 'store']);

Route::post('/adicionar-genero', [GeneroController::class, 'store']);

Route::post('/adicionar-filme', [FilmeController::class, 'store']);

Route::post('/login', [ClienteController::class, 'login']);

Route::post('responder-mensagem', [ContatoController::class, 'enviarMensagem']);

Route::get('/emails/contato', function () {
    return view ('emails/contato');
})->name('emails.contato');