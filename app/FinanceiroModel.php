<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinanceiroModel extends Model
{
    protected $table = 'financeiro';
    protected $fillable = ['data_venc', 'data_pag', 'valor', 'id_user', 'id_aluno', 'mes_ref'];
    public function alunos(){
        return $this->belongsTo('App\AlunosModel');
    }
}
