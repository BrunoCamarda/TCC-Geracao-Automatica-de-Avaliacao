<?php

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
    return view('auth.login');
});

Auth::routes();

Route::resource('/questoes', 'QuestaoController');
Route::resource('/assuntos', 'AssuntoController');

Route::get('/home', 'QuestaoController@cadastrarView')->name('home');
Route::get('/gerenciar', 'AvaliacaoController@all')->name('gerenciar');
Route::get('/avaliacao/{id}', 'AvaliacaoController@show')->name('gerenciarAva');
Route::get('/cadastrar', 'QuestaoController@cadastrarView' )->name('cadastrar');
Route::get('/gerar', 'QuestaoController@gerar' )->name('gerar');
Route::get('/gerarAva', 'QuestaoController@gerarAvaliacao')->name('gerarAva');
Route::post('/view', 'AvaliacaoController@makePDF')->name('viewGabarito');