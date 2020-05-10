<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunosModel extends Model
{
    protected $table = 'alunos';
    protected $fillable = ['nome','foto','email','senha', 'endereco','bairro','cidade','cep','telefone','turma','dataprimeiraaula', 'nascimento'];

    public function financeiro(){
        return $this->hasMany('App\FinanceiroModel');
    }
}
