<?php

namespace App\Http\Controllers;

use App\AlunosModel;
use App\AlunoTurmaModel;
use App\ExercicioModel;
use App\ExercicioTurmaModel;
use Illuminate\Http\Request;

class FrontOperacoesController extends Controller
{
    public function inseriremturma(Request $request){
        $aluno = AlunosModel::findOrFail($request['id_aluno']);
        $tm = $request['id_turma'];
        $aluno->turma = $tm;
        $aluno->save();
        flash($aluno->nome.' foi inserido em na turma!')->success();
        return redirect()->route('turma.show',$tm );
    }

    public function removerdaturma($id){
        $aluno = AlunosModel::findOrFail($id);
        $tm = $aluno->turma;
        $aluno->turma = null;
        $aluno->save();
        flash($aluno->nome.' foi removido da turma com sucesso!')->success();
        return redirect()->route('turma.show', $tm);
    }


    public function inserirexercicioemturma(Request $request){
        $exercicio = new ExercicioTurmaModel();
        $tm = $request['id_turma'];
        $exercicio->id_turma = $tm;
        $exercicio->id_exercicio = $request['id_exercicio'];
        $exercicio->save();
        flash('Exercício inserido na turma!')->success();
        return redirect()->route('turma.show',$tm );
    }

    public function removerexerciciodaturma($id){
        $exercicio = ExercicioTurmaModel::findOrFail($id);
        $tm = $exercicio->id_turma;
        $exercicio->delete();
        flash('Exercício foi removido da turma com sucesso!')->success();
        return redirect()->route('turma.show', $tm);
    }


}
