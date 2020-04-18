<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnamneseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anamneses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_aluno')->unsigned();
            $table->foreign('id_aluno')->references('id')->on('alunos')->cascadeOnDelete();
            $table->string('acordaanoite')->nullable();
            $table->string('alergia')->nullable();
            $table->string('alimentacao')->nullable();
            $table->string('altura')->nullable();
            $table->string('atividadefisica')->nullable();
            $table->string('comonosconheceu')->nullable();
            $table->string('comosesentenotrabalho')->nullable();
            $table->string('cuidadomedico')->nullable();
            $table->string('descricaodesono')->nullable();
            $table->string('desenvolvimentopessoal')->nullable();
            $table->string('diabetes')->nullable();
            $table->string('doresdecabeca')->nullable();
            $table->string('doresdecoluna')->nullable();
            $table->string('emergenciaavisar')->nullable();
            $table->string('estadomental')->nullable();
            $table->string('evacuacao')->nullable();
            $table->string('hipertenso')->nullable();
            $table->string('horariodedormir')->nullable();
            $table->string('lesaoouacometimento')->nullable();
            $table->string('limitacaodemovimento')->nullable();
            $table->string('litrosdeaguapordia')->nullable();
            $table->string('maissobrevoce')->nullable();
            $table->string('medicacao')->nullable();
            $table->string('medicamentos')->nullable();
            $table->string('objetivo')->nullable();
            $table->string('peso')->nullable();
            $table->string('problemadesaude')->nullable();
            $table->string('profissao')->nullable();
            $table->string('protese')->nullable();
            $table->string('yoga')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anamneses');
    }
}
