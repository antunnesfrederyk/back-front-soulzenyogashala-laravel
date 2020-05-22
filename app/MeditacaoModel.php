<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeditacaoModel extends Model
{
    //
    protected $table = 'meditacao';
    protected $fillable = ['audio', 'nome', 'categoria'];
}
