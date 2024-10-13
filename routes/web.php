<?php

use App\Http\Controllers\FilmeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdminController;
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
    return view('sobre');
});

Route::put('editar-filme/{id}', [FilmeController::class, 'update']);

Route::get('/', [FilmeController::class, 'read']);

Route::get('/filme/{id}', [FilmeController::class, 'find']);

Route::post('/enviar-contato', [ContatoController::class, 'store']);

Route::post('/adicionar-genero', [GeneroController::class, 'store']);

Route::post('/adicionar-filme', [FilmeController::class, 'store']);

Route::post('responder-mensagem', [ContatoController::class, 'enviarMensagem']);

Route::get('/emails/contato', function () {
    return view('emails/contato');
})->name('emails.contato');

// rotas de autenticação
Route::post('/login', [UsuarioController::class, 'login'])->name('login.envio');
Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');

// rotas de cadastro de cliente
Route::post('/registro/cliente', [ClienteController::class, 'registro'])->name('registro.cliente.envio');

// rotas de cadastro de admin
Route::post('/registro/admin', [AdminController::class, 'store'])->name('registro.admin.envio');


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('isAdmin');

    Route::get('/admin/usuarios', [AdminController::class, 'usuarios'])->name('admin.usuarios')->middleware('isAdmin');

    Route::get('/admin/filmes', [AdminController::class, 'filmes'])->name('admin.filmes')->middleware('isAdmin');

    Route::get('/admin/generos', [AdminController::class, 'generos'])->name('admin.generos')->middleware('isAdmin');

    Route::get('/admin/contatos', [AdminController::class, 'contatos'])->name('admin.contatos')->middleware('isAdmin');

    Route::put('/exclusao/usuario/{id}', [ClienteController::class, 'destroy'])->name('usuarios.deletar')->middleware('isAdmin');

    Route::put('/exclusao/filme/{id}', [FilmeController::class, 'destroy'])->name('filmes.deletar')->middleware('isAdmin');

    Route::put('/exclusao/contato/{id}', [ContatoController::class, 'destroy'])->name('contatos.deletar')->middleware('isAdmin');

    Route::put('/exclusao/genero/{id}', [GeneroController::class, 'destroy'])->name('generos.deletar')->middleware('isAdmin');
});
