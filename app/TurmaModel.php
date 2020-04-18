<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TurmaModel extends Model
{
    protected $table = 'turmas';
    protected $fillable = ['id_user','nome','descricao','codigodeacesso'];
}
