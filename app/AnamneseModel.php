<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnamneseModel extends Model
{

    protected $table = 'anamneses';
    protected $fillable = ['id_aluno', 'acordaanoite', 'alergia', 'alimentacao' , 'altura', 'atividadefisica', 'comonosconheceu', 'comosesentenotrabalho','cuidadomedico' ,'descricaodesono','desenvolvimentopessoal','diabetes','doresdecabeca', 'doresdecoluna', 'emergenciaavisar' , 'estadomental','evacuacao', 'hipertenso','horariodedormir','lesaoouacometimento','limitacaodemovimento','litrosdeaguapordia','maissobrevoce','medicacao','medicamentos','objetivo','peso','problemadesaude','profissao','protese','yoga'];
}
