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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::resource("agenda", "FrontAgendaController");
    Route::resource("aluno", "FrontAlunoController");
    Route::resource("anamnese", "FrontAnamneseController");
    Route::resource("post", "FrontPostController");
    Route::resource("turma", "FrontTurmaController");
    Route::resource("aula", "FrontAulaController");
    Route::resource("financeiro", "FrontFinanceiroController");
    Route::resource("exercicio", "FrontExerciciosController");
    Route::post('inseriremturma', 'FrontOperacoesController@inseriremturma')->name('inseriremturma');
    Route::get('removerdaturma/{id}', 'FrontOperacoesController@removerdaturma')->name('removerdaturma');
    Route::post('inserirexercicioemturma', 'FrontOperacoesController@inserirexercicioemturma')->name('inserirexercicioemturma');
    Route::get('removerexerciciodaturma/{id}', 'FrontOperacoesController@removerexerciciodaturma')->name('removerexerciciodaturma');
});
