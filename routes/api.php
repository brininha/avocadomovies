<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Método get de todas as tabelas

Route::get('/filme', 'App\Http\Controllers\FilmeController@index');

Route::get('/cliente', 'App\Http\Controllers\ClienteController@read');

Route::get('/contato', 'App\Http\Controllers\ContatoController@read');

Route::get('/genero', 'App\Http\Controllers\GeneroController@index');

// Método post de todas as tabelas

Route::post('/postFilme', 'App\Http\Controllers\FilmeController@store');

Route::post('/postCliente', 'App\Http\Controllers\ClienteController@store');

Route::post('/postContato', 'App\Http\Controllers\ContatoController@store');

Route::post('/postGenero', 'App\Http\Controllers\GeneroController@store');

// Método update de todas as tabelas

Route::put('/putFilme/{id}', 'App\Http\Controllers\FilmeController@update');

Route::put('/putCliente/{id}', 'App\Http\Controllers\ClienteController@update');

Route::put('/putContato/{id}', 'App\Http\Controllers\ContatoController@update');

Route::put('/putGenero/{id}', 'App\Http\Controllers\GeneroController@update');

Route::put('/usarIngresso/{id}', 'App\Http\Controllers\IngressoController@update');

// Método delete de todas as tabelas

Route::delete('/deleteFilme/{id}', 'App\Http\Controllers\FilmeController@destroy');

Route::delete('/deleteCliente/{id}', 'App\Http\Controllers\ClienteController@destroy');

Route::delete('/deleteContato/{id}', 'App\Http\Controllers\ContatoController@destroy');

Route::delete('/deleteGenero/{id}', 'App\Http\Controllers\GeneroController@destroy');

Route::post('/registro/cliente', 'App\Http\Controllers\ClienteController@registro');

Route::get('/filmes/dados/generos', 'App\Http\Controllers\GeneroController@getFilmesGeneros');

Route::get('/filmes/dados/faixas', 'App\Http\Controllers\GeneroController@getFilmesFaixas');
