<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceiroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('financeiro', function (Blueprint $table) {
            $table->id();
            $table->date('data_venc')->nullable();
            $table->date('data_pag')->nullable();
            $table->string('valor')->nullable();
            $table->string('mes_ref')->nullable();
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->cascadeOnDelete();
            $table->bigInteger('id_aluno')->unsigned();
            $table->foreign('id_aluno')->references('id')->on('alunos')->cascadeOnDelete();
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
        Schema::dropIfExists('financeiro');
    }
}
