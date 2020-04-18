<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $fillable = ['titulo', 'descricao', 'id_user', 'imagem'];
    //
}
