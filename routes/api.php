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

Route::resource("agendas", "ApiAgendaController");
Route::resource("alunos", "ApiAlunoController");
Route::resource("anamneses", "ApiAnamneseController");
Route::resource("posts", "ApiPostController");
Route::resource("aulas", "ApiAulasController");
Route::resource("turmas", "ApiTurmaController");
Route::resource("exercicios", "ApiExerciciosController");
Route::resource("financeiros", "ApiFinanceiroController");
Route::get("autenticar/{email}/{senha}", "ApiAuthAlunoController@autenticar");
Route::get("proximoseventos", "ApiAuthAlunoController@proximoseventos");
Route::get("entrarnaturma/{idaluno}/{codigodeacesso}", "ApiAuthAlunoController@entrarnaturma");
Route::get("sairdaturma/{idaluno}", "ApiAuthAlunoController@sairdaturma");
Route::get("listaralunosdaturma/{idturma}", "ApiAuthAlunoController@listaralunosTurma");
Route::get("exerciciosporturma/{idturma}", "ApiAuthAlunoController@exerciciosporturma");
Route::post("upload", "ApiAuthAlunoController@uploadfoto");
Route::get("foto/{id}/{foto}", "ApiAuthAlunoController@alterarfoto");

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
