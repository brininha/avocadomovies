<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/contato', function () {
    return view('contato');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/cadastro', function () {
    return view ('cadastro');
});

Route::get('/sobre', function () {
    return view ('sobre');
});

Route::get('/', 'App\Http\Controllers\FilmeController@index');
