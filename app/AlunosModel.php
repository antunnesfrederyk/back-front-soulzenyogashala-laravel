<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunosModel extends Model
{
    protected $table = 'alunos';
    protected $fillable = ['nome','email','senha', 'endereco','bairro','cidade','cep','telefone','turma','dataprimeiraaula', 'nascimento'];
}
