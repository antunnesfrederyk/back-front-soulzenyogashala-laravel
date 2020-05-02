<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aula', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('dia_semana');
            $table->string('hora_inicio_fim');
            $table->bigInteger('id_turma')->unsigned();
            $table->foreign('id_turma')->references('id')->on('turmas')->cascadeOnDelete();
            $table->string('professor');
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
        Schema::dropIfExists('aula');
    }
}
