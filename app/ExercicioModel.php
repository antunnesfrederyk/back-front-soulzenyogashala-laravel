<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExercicioModel extends Model
{
    protected $table = 'exercicios';
    protected $fillable = ['audio', 'descricao', 'duracao', 'id_user', 'imagem', 'titulo'];
}
