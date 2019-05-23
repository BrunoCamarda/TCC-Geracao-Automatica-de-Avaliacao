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
    return view('welcome');
});

Auth::routes();

Route::resource('/questoes', 'QuestaoController');
Route::resource('/assuntos', 'AssuntoController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cadastrar', 'QuestaoController@cadastrarView' )->name('cadastrar');
Route::get('/gerar', 'QuestaoController@gerar' )->name('gerar');
Route::get('/gerarAva', 'QuestaoController@gerarAvaliacao')->name('gerarAva');
Route::get('/view', 'AvaliacaoController@makePDF')->name('viewPDF');