<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AulaModel extends Model
{
    protected $table = 'aula';
    protected $fillable = ['titulo', 'dia_semana', 'hora_inicio_fim', 'id_turma', 'professor'];
}
