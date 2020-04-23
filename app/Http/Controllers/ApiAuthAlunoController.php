<?php

namespace App\Http\Controllers;

use App\AgendaModel;
use App\AlunosModel;
use App\AlunoTurmaModel;
use App\ExercicioTurmaModel;
use App\TurmaModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiAuthAlunoController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $email
     * @param  int  $senha
     * @return AlunosModel[]|\Illuminate\Database\Eloquent\Collection
     */
    public function autenticar($email, $senha){
        return AlunosModel::all()->where('email', $email)->where('senha', $senha);
    }

    public function proximoseventos(){
        return AgendaModel::all()->where('data', '>=', Carbon::now());
    }

    public function entrarnaturma($idaluno, $codigodeacesso){
        $turma = TurmaModel::all()->where('codigodeacesso', $codigodeacesso)->get(0);
        $aluno = AlunosModel::all()->where('id', $idaluno)->get(0);
        $aluno->turma = $turma->id;
        $aluno->save();
        return $turma;
    }

    public function sairdaturma($idaluno){
        $aluno = AlunosModel::findOrFail($idaluno);
        $aluno->turma = "";
        $aluno->save();
        return $aluno;
    }

    public function listaralunosTurma($idturma){
        return AlunoTurmaModel::all()->where('id_turma', $idturma);
    }

    public function exerciciosporturma($idturma){
        return ExercicioTurmaModel::all()->where('id_turma', $idturma);
    }
}
