<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExercicioTurmaModel extends Model
{
    //
    protected $table = 'exercicio_turma';
    protected $fillable = ['id_exercicio', 'id_turma'];
}
