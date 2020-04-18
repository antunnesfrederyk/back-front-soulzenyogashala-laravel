<?php

namespace App\Http\Controllers;

use App\AlunosModel;
use App\AlunoTurmaModel;
use Illuminate\Http\Request;

class FrontOperacoesController extends Controller
{
    public function inseriremturma(Request $request){
        $aluno = AlunosModel::findOrFail($request['id_aluno']);
        $aluno->turma = $request['id_turma'];
        $aluno->save();
        flash($aluno->nome.' foi inserido em uma turma!')->success();
        return redirect()->route('alunos.index');
    }

    public function removerdaturma($id){
        $aluno = AlunosModel::findOrFail($id);
        $aluno->turma = null;
        $aluno->save();
        flash($aluno->nome.' foi removido da turma com sucesso!')->success();
        return redirect()->route('alunos.index');
    }


}
