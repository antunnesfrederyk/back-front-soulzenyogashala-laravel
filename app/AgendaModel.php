<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgendaModel extends Model
{
    protected $table = 'agendas';
    protected $fillable = ['data','id_user','descricao','endereco','link','titulo','valor'];
    //
}
