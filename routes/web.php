<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ClienteController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/sobre', function () {
    return view ('sobre');
});

Route::get('/admin', [ClienteController::class, 'read']);
Route::put('/deletar-usuario/{id}', [ClienteController::class, 'destroy'])->name('usuarios.deletar');

Route::get('/', 'App\Http\Controllers\FilmeController@index');

Route::post('/enviar-contato', [ContatoController::class, 'store']);

Route::post('/cadastrar-usuario', [ClienteController::class, 'store']);

Route::post('/login', [ClienteController::class, 'login']);