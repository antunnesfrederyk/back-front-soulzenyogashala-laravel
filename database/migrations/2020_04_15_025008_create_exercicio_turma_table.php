<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercicioTurmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercicio_turma', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_turma')->unsigned();
            $table->foreign('id_turma')->references('id')->on('turmas')->cascadeOnDelete();
            $table->bigInteger('id_exercicio')->unsigned();
            $table->foreign('id_exercicio')->references('id')->on('exercicios')->cascadeOnDelete();


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
        Schema::dropIfExists('exercicio_turma');
    }
}
