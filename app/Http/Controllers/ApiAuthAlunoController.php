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
        $list = [];
        array_push($list, AlunosModel::all()->where('email', $email)->where('senha', $senha)->first());
        return $list;
    }

    public function proximoseventos(){
        return AgendaModel::all()->where('data', '>=', Carbon::now())->values();
    }

    public function entrarnaturma($idaluno, $codigodeacesso){
        $turma = TurmaModel::all()->where('codigodeacesso', $codigodeacesso)->first();
        $aluno = AlunosModel::all()->where('id', $idaluno)->first();
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

    public function uploadfoto(Request $request){
        $id = $request['id'];
        $newName = $request['name'];
        $imagem = $request['imagem'];
        $file = base64_decode($imagem);
        if ($file !=null){
            $file->move(public_path('profile'), $newName);
            $aluno = AlunosModel::findOrFail($id);
            $aluno->foto = "profile/".$newName;
            $aluno->save();
            return "profile/".$newName;
        }
        return "erro";
    }

    public function alterarfoto($id, $foto){
        $aluno = AlunosModel::findOrFail($id);
        $aluno->foto = "images/".$foto;
        $aluno->save();
        $alun = AlunosModel::all()->where('id', $id)->values();
        return $alun;

    }
}
